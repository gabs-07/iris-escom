<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AdminController extends Controller
{
    /**
     * Display admin dashboard.
     */
    public function dashboard(): View
    {
        return view('dashboards.admin', [
            'totalUsers' => User::count(),
            'pacientes' => User::where('rol', 1)->count(),
            'psicologos' => User::where('rol', 2)->count(),
            'psiquiatras' => User::where('rol', 3)->count(),
        ]);
    }

    /**
     * Display list of users.
     */
    public function users(): View
    {
        $users = User::all();
        
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show form for creating a new user.
     */
    public function createUser(): View
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created user in database.
     */
    public function storeUser(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'rol' => ['required', 'integer', 'between:1,4'],
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'rol' => $validated['rol'],
        ]);

        return redirect()->route('admin.users')->with('status', 'Usuario creado exitosamente.');
    }

    /**
     * Show form for editing a user.
     */
    public function editUser(User $user): View
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update user in database.
     */
    public function updateUser(Request $request, User $user): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'rol' => ['required', 'integer', 'between:1,4'],
        ]);

        $updateData = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'rol' => $validated['rol'],
        ];

        if (!empty($validated['password'])) {
            $updateData['password'] = Hash::make($validated['password']);
        }

        $user->update($updateData);

        return redirect()->route('admin.users')->with('status', 'Usuario actualizado exitosamente.');
    }

    /**
     * Delete a user.
     */
    public function destroyUser(User $user): RedirectResponse
    {
        $user->delete();

        return redirect()->route('admin.users')->with('status', 'Usuario eliminado exitosamente.');
    }
}
