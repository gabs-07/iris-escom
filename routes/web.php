<?php

use App\Http\Controllers\Paciente\ChatController;
use App\Http\Controllers\Paciente\DiarioController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ForoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return match ((int) Auth::user()->rol) {
            1 => redirect()->route('dashboard.paciente'),
            2 => redirect()->route('dashboard.psicologo'),
            3 => redirect()->route('dashboard.psiquiatra'),
            default => abort(403),
        };
    })->name('dashboard');

    Route::get('/dashboard/paciente', function () {
        return view('dashboards.paciente');
    })->name('dashboard.paciente');

    Route::get('/dashboard/psicologo', function () {
        return view('dashboards.psicologo');
    })->name('dashboard.psicologo');

    Route::get('/dashboard/psiquiatra', function () {
        return view('dashboards.psiquiatra');
    })->name('dashboard.psiquiatra');

    Route::prefix('foro')->name('foro.')->group(function () {
        Route::get('/', [ForoController::class, 'index'])->name('index');
        Route::post('/publicaciones', [ForoController::class, 'storePublicacion'])->name('publicaciones.store');
        Route::post('/publicaciones/{publicacion}/comentarios', [ForoController::class, 'storeComentario'])->name('publicaciones.comentarios.store');
        Route::get('/comentarios/{comentario}/editar', [ForoController::class, 'editComentario'])->name('comentarios.edit');
        Route::patch('/comentarios/{comentario}', [ForoController::class, 'updateComentario'])->name('comentarios.update');
        Route::delete('/comentarios/{comentario}', [ForoController::class, 'destroyComentario'])->name('comentarios.destroy');
    });

    Route::middleware('auth')->prefix('diarios')->name('diarios.')->group(function () {
        Route::get('/', [DiarioController::class, 'index'])->name('index');
        Route::get('/crear', [DiarioController::class, 'create'])->name('create');
        Route::post('/', [DiarioController::class, 'store'])->name('store');
        Route::get('/{diario}', [DiarioController::class, 'show'])->name('show');
    });

    Route::middleware('auth')->prefix('chats')->name('chats.')->group(function () {
        Route::get('/', [ChatController::class, 'index'])->name('index');
        Route::post('/', [ChatController::class, 'store'])->name('store');
        Route::get('/{chat}', [ChatController::class, 'show'])->name('show');
        Route::patch('/{chat}/accept', [ChatController::class, 'accept'])->name('accept');
        Route::patch('/{chat}/reject', [ChatController::class, 'reject'])->name('reject');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
