<?php

use App\Http\Controllers\Paciente\ChatController;
use App\Http\Controllers\Paciente\DiarioController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ForoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfessionalCredentialController;
use App\Http\Controllers\Admin\CredentialApprovalController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Rutas de credenciales profesionales - FUERA del middleware professional_verified
Route::middleware(['auth', 'verified'])->prefix('credentials')->name('credentials.')->group(function () {
    Route::get('/create', [ProfessionalCredentialController::class, 'create'])->name('create');
    Route::post('/', [ProfessionalCredentialController::class, 'store'])->name('store');
    Route::get('/pending', [ProfessionalCredentialController::class, 'pending'])->name('pending');
    Route::get('/rejected/{credential}', [ProfessionalCredentialController::class, 'rejected'])->name('rejected');
    Route::post('/{credential}/resubmit', [CredentialApprovalController::class, 'resubmit'])->name('resubmit');
});

Route::middleware(['auth', 'verified', 'professional_verified'])->group(function () {
    Route::get('/dashboard', function () {
        return match ((int) Auth::user()->rol) {
            1 => redirect()->route('dashboard.paciente'),
            2 => redirect()->route('dashboard.psicologo'),
            3 => redirect()->route('dashboard.psiquiatra'),
            4 => redirect()->route('dashboard.admin'),
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

    Route::get('/dashboard/admin', [AdminController::class, 'dashboard'])->name('dashboard.admin');

    // Rutas de administración de usuarios
    Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/users', [AdminController::class, 'users'])->name('users');
        Route::get('/users/crear', [AdminController::class, 'createUser'])->name('users.create');
        Route::post('/users', [AdminController::class, 'storeUser'])->name('users.store');
        Route::get('/users/{user}/editar', [AdminController::class, 'editUser'])->name('users.edit');
        Route::patch('/users/{user}', [AdminController::class, 'updateUser'])->name('users.update');
        Route::delete('/users/{user}', [AdminController::class, 'destroyUser'])->name('users.destroy');
        
        // Rutas de aprobación de credenciales profesionales
        Route::get('/credentials', [CredentialApprovalController::class, 'index'])->name('credentials.index');
        Route::get('/credentials/{credential}', [CredentialApprovalController::class, 'show'])->name('credentials.show');
        Route::post('/credentials/{credential}/approve', [CredentialApprovalController::class, 'approve'])->name('credentials.approve');
        Route::post('/credentials/{credential}/reject', [CredentialApprovalController::class, 'reject'])->name('credentials.reject');
    });

    Route::middleware('require_completed_credentials')->prefix('foro')->name('foro.')->group(function () {
        Route::get('/', [ForoController::class, 'index'])->name('index');
        Route::post('/publicaciones', [ForoController::class, 'storePublicacion'])->name('publicaciones.store');
        Route::get('/publicaciones/{publicacion}/editar', [ForoController::class, 'editPublicacion'])->name('publicaciones.edit');
        Route::patch('/publicaciones/{publicacion}', [ForoController::class, 'updatePublicacion'])->name('publicaciones.update');
        Route::delete('/publicaciones/{publicacion}', [ForoController::class, 'destroyPublicacion'])->name('publicaciones.destroy');
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
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/profile/{userId}', [ProfileController::class, 'showUser'])->name('profile.user');

require __DIR__.'/auth.php';
