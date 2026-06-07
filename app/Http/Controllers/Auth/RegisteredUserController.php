<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'apellidos' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'fecha_nacimiento' => ['required', 'date'],
            'genero' => ['required', 'string', 'in:femenino,masculino,no-binario,prefiero-no-decir,otro'],
            'telefono' => ['required', 'string', 'max:20'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'emergencia_nombre' => ['required', 'string', 'max:255'],
            'emergencia_relacion' => ['required', 'string', 'max:255'],
            'emergencia_telefono' => ['required', 'string', 'max:20'],
            'rol' => ['required', 'integer', 'in:1,2,3'],
            'terminos' => ['required', 'accepted']
        ]);

        $user = User::create([
            'name' => $request->nombre,
            'apellidos' => $request->apellidos,
            'email' => $request->email,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'genero' => $request->genero,
            'telefono' => $request->telefono,
            'password' => Hash::make($request->password),
            'emergencia_nombre' => $request->emergencia_nombre,
            'emergencia_relacion' => $request->emergencia_relacion,
            'emergencia_telefono' => $request->emergencia_telefono,
            'rol' => $request->rol,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
