<?php

namespace App\Http\Controllers;

use App\Models\ComentarioPublicacion;
use App\Models\Publicacion;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ForoController extends Controller
{
    public function index(): View
    {
        $publicaciones = Publicacion::query()
            ->with(['user', 'comentarios.user'])
            ->latest('id')
            ->paginate(10);

        return view('foro.index', compact('publicaciones'));
    }

    public function storePublicacion(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'contenido' => ['required', 'string', 'max:5000'],
        ]);

        Publicacion::create([
            'user_id' => Auth::id(),
            'contenido' => $validated['contenido'],
        ]);

        return redirect()->route('foro.index')->with('status', 'Publicación creada.');
    }

    public function storeComentario(Request $request, Publicacion $publicacion): RedirectResponse
    {
        $validated = $request->validate([
            'contenido' => ['required', 'string', 'max:2000'],
        ]);

        ComentarioPublicacion::create([
            'publicacion_id' => $publicacion->id,
            'user_id' => Auth::id(),
            'contenido' => $validated['contenido'],
        ]);

        return redirect()->route('foro.index')->with('status', 'Comentario publicado.');
    }

    public function editComentario(ComentarioPublicacion $comentario): View
    {
        abort_unless($comentario->user_id === Auth::id(), 403);

        return view('foro.comentarios.edit', compact('comentario'));
    }

    public function updateComentario(Request $request, ComentarioPublicacion $comentario): RedirectResponse
    {
        abort_unless($comentario->user_id === Auth::id(), 403);

        $validated = $request->validate([
            'contenido' => ['required', 'string', 'max:2000'],
        ]);

        $comentario->update([
            'contenido' => $validated['contenido'],
        ]);

        return redirect()->route('foro.index')->with('status', 'Comentario actualizado.');
    }

    public function destroyComentario(ComentarioPublicacion $comentario): RedirectResponse
    {
        abort_unless($comentario->user_id === Auth::id(), 403);

        $comentario->delete();

        return redirect()->route('foro.index')->with('status', 'Comentario eliminado.');
    }
}
