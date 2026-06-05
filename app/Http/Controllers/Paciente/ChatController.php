<?php

namespace App\Http\Controllers\Paciente;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\ChatMessage;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ChatController extends Controller
{
    private function ensurePaciente(): void
    {
        $user = Auth::user();

        abort_unless($user instanceof User && (int) $user->rol === 1, 403);
    }

    private function chatBetween(int $userOneId, int $userTwoId): ?Chat
    {
        return Chat::query()
            ->where(function ($query) use ($userOneId, $userTwoId) {
                $query->where('sender_id', $userOneId)
                    ->where('recipient_id', $userTwoId);
            })
            ->orWhere(function ($query) use ($userOneId, $userTwoId) {
                $query->where('sender_id', $userTwoId)
                    ->where('recipient_id', $userOneId);
            })
            ->first();
    }

    public function index(): View
    {
        $this->ensurePaciente();

        /** @var User $user */
        $user = Auth::user();

        // Exclude patients that already have a non-rejected chat with the user
        $excludedIds = Chat::query()
            ->where(function ($q) use ($user) {
                $q->where('sender_id', $user->id)
                    ->orWhere('recipient_id', $user->id);
            })
            ->where('status', '!=', 'rejected')
            ->get()
            ->map(function (Chat $c) use ($user) {
                return $c->sender_id === $user->id ? $c->recipient_id : $c->sender_id;
            })
            ->unique()
            ->values()
            ->all();

        $availablePatients = User::query()
            ->where('rol', 1)
            ->whereKeyNot($user->id)
            ->when(count($excludedIds), fn($q) => $q->whereNotIn('id', $excludedIds))
            ->orderBy('name')
            ->get();

        $chats = Chat::query()
            ->where('sender_id', $user->id)
            ->orWhere('recipient_id', $user->id)
            ->with(['sender', 'recipient', 'messages.user'])
            ->latest('id')
            ->get();

        $activeChat = null;

        if ($requestChatId = request()->integer('chat')) {
            $activeChat = Chat::query()
                ->whereKey($requestChatId)
                ->where(function ($query) use ($user) {
                    $query->where('sender_id', $user->id)
                        ->orWhere('recipient_id', $user->id);
                })
                ->with(['sender', 'recipient', 'messages.user'])
                ->first();
        }

        $activeChat ??= $chats->first();

        return view('chats.index', compact('availablePatients', 'chats', 'activeChat'));
    }

    public function store(Request $request): RedirectResponse
    {
        $this->ensurePaciente();

        $validated = $request->validate([
            'recipient_id' => ['required', 'integer', 'exists:users,id'],
            'body' => ['required_without:request_body', 'nullable', 'string', 'max:5000'],
            'request_body' => ['required_without:body', 'nullable', 'string', 'max:5000'],
        ]);

        /** @var User $user */
        $user = Auth::user();
        $recipient = User::query()->findOrFail($validated['recipient_id']);

        abort_unless((int) $recipient->rol === 1 && $recipient->id !== $user->id, 403);

        $chat = $this->chatBetween($user->id, $recipient->id);

        if (! $chat) {
            $chat = Chat::create([
                'sender_id' => $user->id,
                'recipient_id' => $recipient->id,
                'requested_by_id' => $user->id,
                'status' => 'pending',
            ]);
        }

        if ($chat->status === 'rejected') {
            return redirect()->route('chats.index')->with('status', 'Este chat fue rechazado y no puede reabrirse desde aquí.');
        }

        $messageBody = $validated['body'] ?? $validated['request_body'];

        if ($chat->status === 'accepted' || $chat->requested_by_id === $user->id) {
            ChatMessage::create([
                'chat_id' => $chat->id,
                'user_id' => $user->id,
                'body' => $messageBody,
            ]);

            return redirect()->route('chats.show', $chat)->with('status', 'Mensaje enviado.');
        }

        ChatMessage::create([
            'chat_id' => $chat->id,
            'user_id' => $user->id,
            'body' => $messageBody,
        ]);

        return redirect()->route('chats.show', $chat)->with('status', 'Solicitud de chat enviada.');
    }

    public function show(Chat $chat): View
    {
        $this->ensurePaciente();

        /** @var User $user */
        $user = Auth::user();

        abort_unless($chat->sender_id === $user->id || $chat->recipient_id === $user->id, 403);

        $chat->load(['sender', 'recipient', 'messages.user']);

        // Exclude patients that already have a non-rejected chat with the user
        $excludedIds = Chat::query()
            ->where(function ($q) use ($user) {
                $q->where('sender_id', $user->id)
                    ->orWhere('recipient_id', $user->id);
            })
            ->where('status', '!=', 'rejected')
            ->get()
            ->map(function (Chat $c) use ($user) {
                return $c->sender_id === $user->id ? $c->recipient_id : $c->sender_id;
            })
            ->unique()
            ->values()
            ->all();

        $availablePatients = User::query()
            ->where('rol', 1)
            ->whereKeyNot($user->id)
            ->when(count($excludedIds), fn($q) => $q->whereNotIn('id', $excludedIds))
            ->orderBy('name')
            ->get();

        $chats = Chat::query()
            ->where('sender_id', $user->id)
            ->orWhere('recipient_id', $user->id)
            ->with(['sender', 'recipient', 'messages.user'])
            ->latest('id')
            ->get();

        return view('chats.show', [
            'chat' => $chat,
            'availablePatients' => $availablePatients,
            'chats' => $chats,
        ]);
    }

    public function accept(Chat $chat): RedirectResponse
    {
        $this->ensurePaciente();

        /** @var User $user */
        $user = Auth::user();

        abort_unless($chat->recipient_id === $user->id, 403);

        if ($chat->status !== 'pending') {
            return redirect()->route('chats.show', $chat)->with('status', 'Este chat ya no está pendiente.');
        }

        $chat->update([
            'status' => 'accepted',
            'accepted_by_id' => $user->id,
            'accepted_at' => now(),
        ]);

        return redirect()->route('chats.show', $chat)->with('status', 'Chat aceptado.');
    }

    public function reject(Chat $chat): RedirectResponse
    {
        $this->ensurePaciente();

        /** @var User $user */
        $user = Auth::user();

        abort_unless($chat->recipient_id === $user->id, 403);

        if ($chat->status !== 'pending') {
            return redirect()->route('chats.show', $chat)->with('status', 'Este chat ya fue procesado.');
        }

        $chat->update([
            'status' => 'rejected',
            'rejected_by_id' => $user->id,
            'rejected_at' => now(),
        ]);

        return redirect()->route('chats.index')->with('status', 'Chat rechazado.');
    }
}