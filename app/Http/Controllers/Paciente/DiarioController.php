<?php

namespace App\Http\Controllers\Paciente;

use App\Http\Controllers\Controller;
use App\Models\Diario;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DiarioController extends Controller
{
    private function ensurePaciente(): void
    {
        $user = Auth::user();

        abort_unless($user instanceof User && (int) $user->rol === 1, 403);
    }

    public function index(): View
    {
        $this->ensurePaciente();

        /** @var User $user */
        $user = Auth::user();

        return view('diarios.index', [
            'todayDiary' => $user->diarios()
                ->whereDate('fecha', Carbon::today()->toDateString())
                ->first(),
            'diaries' => $user->diarios()
                ->latest('fecha')
                ->latest('id')
                ->paginate(10),
        ]);
    }

    public function create(): View|RedirectResponse
    {
        $this->ensurePaciente();

        /** @var User $user */
        $user = Auth::user();

        $todayDiary = $user->diarios()
            ->whereDate('fecha', Carbon::today()->toDateString())
            ->first();

        if ($todayDiary) {
            return redirect()
                ->route('diarios.show', $todayDiary)
                ->with('status', 'Ya registraste el diario de hoy.');
        }

        return view('diarios.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $this->ensurePaciente();

        $validated = $request->validate([
            'contenido' => ['required', 'string', 'max:5000'],
        ]);

        $today = Carbon::today()->toDateString();
        /** @var User $user */
        $user = Auth::user();

        $existingDiary = $user->diarios()
            ->whereDate('fecha', $today)
            ->first();

        if ($existingDiary) {
            return redirect()
                ->route('diarios.show', $existingDiary)
                ->with('status', 'El diario de hoy ya fue guardado.');
        }

        $diario = Diario::create([
            'user_id' => $user->id,
            'fecha' => $today,
            'contenido' => $validated['contenido'],
        ]);

        return redirect()
            ->route('diarios.show', $diario)
            ->with('status', 'Diario guardado correctamente.');
    }

    public function show(Diario $diario): View
    {
        $this->ensurePaciente();

        abort_unless($diario->user_id === Auth::id(), 403);

        return view('diarios.show', [
            'diario' => $diario,
        ]);
    }
}