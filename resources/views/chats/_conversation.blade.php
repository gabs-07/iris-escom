<div class="flex min-h-[72vh] flex-col rounded-3xl border border-gray-700 bg-gray-900 text-white">
    @if ($chat)
        @php
            $otherUser = $chat->sender_id === auth()->id() ? $chat->recipient : $chat->sender;
        @endphp
        <div class="border-b border-gray-700 px-5 py-4">
            <div class="flex items-center justify-between gap-4">
                <div>
                    <p class="text-xs uppercase tracking-[0.3em] text-emerald-300">{{ ucfirst($chat->status) }}</p>
                    <h4 class="mt-1 text-lg font-semibold text-white">{{ $otherUser->name }}</h4>
                </div>
                @if ($chat->status === 'pending' && $chat->recipient_id === auth()->id())
                    <div class="flex flex-wrap gap-2">
                        <form method="POST" action="{{ route('chats.accept', $chat) }}">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="rounded-full bg-emerald-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-emerald-500">Aceptar</button>
                        </form>
                        <form method="POST" action="{{ route('chats.reject', $chat) }}">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="rounded-full bg-red-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-red-500">Rechazar</button>
                        </form>
                    </div>
                @endif
            </div>
        </div>

        <div class="flex-1 overflow-y-auto bg-gray-950 px-5 py-6">
            <div class="space-y-4">
                @forelse ($chat->messages as $message)
                    <div class="flex {{ $message->user_id === auth()->id() ? 'justify-end' : 'justify-start' }}">
                        <div class="max-w-[80%] rounded-[24px] px-4 py-3 shadow-sm {{ $message->user_id === auth()->id() ? 'rounded-br-md bg-emerald-600 text-white' : 'rounded-bl-md bg-gray-800 text-white' }}">
                            <p class="whitespace-pre-line text-sm leading-6">{{ $message->body }}</p>
                            <p class="mt-2 text-[11px] {{ $message->user_id === auth()->id() ? 'text-emerald-100' : 'text-white/70' }}">
                                {{ $message->user->name }} · {{ $message->created_at->format('d/m/Y H:i') }}
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="flex h-full items-center justify-center py-16 text-sm text-white/70">
                        Aún no hay mensajes en esta conversación.
                    </div>
                @endforelse
            </div>
        </div>

        <div class="border-t border-gray-700 p-4">
            <form method="POST" action="{{ route('chats.store') }}" class="flex items-end gap-3">
                @csrf
                <input type="hidden" name="recipient_id" value="{{ $chat->sender_id === auth()->id() ? $chat->recipient_id : $chat->sender_id }}">
                <textarea id="body" name="body" rows="2" required maxlength="5000" placeholder="Escribe un mensaje..." class="flex-1 rounded-3xl border-gray-600 bg-gray-800 px-4 py-3 text-white placeholder:text-white/60 shadow-sm focus:border-emerald-500 focus:ring-emerald-500"></textarea>
                <button type="submit" class="rounded-full bg-emerald-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-emerald-500">
                    Enviar
                </button>
            </form>
        </div>
    @else
        {{-- No mostrar placeholder cuando no hay conversación activa --}}
    @endif
</div>
