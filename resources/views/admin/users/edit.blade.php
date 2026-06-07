<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Editar Usuario: {{ $user->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-2xl px-4 sm:px-6 lg:px-8">
            <div class="overflow-hidden rounded-lg bg-white dark:bg-gray-800 shadow-sm">
                <div class="px-6 py-8">
                    <form method="POST" action="{{ route('admin.users.update', $user) }}" class="space-y-6">
                        @csrf
                        @method('PATCH')

                        <!-- Nombre -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Nombre
                            </label>
                            <input
                                type="text"
                                name="name"
                                id="name"
                                value="{{ old('name', $user->name) }}"
                                required
                                class="mt-1 block w-full rounded-md border-gray-300 bg-white dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            />
                            @error('name')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Email
                            </label>
                            <input
                                type="email"
                                name="email"
                                id="email"
                                value="{{ old('email', $user->email) }}"
                                required
                                class="mt-1 block w-full rounded-md border-gray-300 bg-white dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            />
                            @error('email')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Rol -->
                        <div>
                            <label for="rol" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Rol
                            </label>
                            <select
                                name="rol"
                                id="rol"
                                required
                                class="mt-1 block w-full rounded-md border-gray-300 bg-white dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            >
                                <option value="">-- Selecciona un Rol --</option>
                                <option value="1" {{ old('rol', $user->rol) == 1 ? 'selected' : '' }}>Paciente</option>
                                <option value="2" {{ old('rol', $user->rol) == 2 ? 'selected' : '' }}>Psicólogo</option>
                                <option value="3" {{ old('rol', $user->rol) == 3 ? 'selected' : '' }}>Psiquiatra</option>
                                <option value="4" {{ old('rol', $user->rol) == 4 ? 'selected' : '' }}>Admin</option>
                            </select>
                            @error('rol')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="rounded-lg bg-gray-50 dark:bg-gray-700 p-4">
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                <strong>Nota:</strong> Dejar los campos de contraseña vacíos para mantener la contraseña actual.
                            </p>
                        </div>

                        <!-- Contraseña (Opcional) -->
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Nueva Contraseña (Opcional)
                            </label>
                            <input
                                type="password"
                                name="password"
                                id="password"
                                class="mt-1 block w-full rounded-md border-gray-300 bg-white dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            />
                            @error('password')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Confirmar Contraseña (Opcional) -->
                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Confirmar Contraseña (Opcional)
                            </label>
                            <input
                                type="password"
                                name="password_confirmation"
                                id="password_confirmation"
                                class="mt-1 block w-full rounded-md border-gray-300 bg-white dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            />
                            @error('password_confirmation')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Botones -->
                        <div class="flex justify-between gap-3">
                            <a href="{{ route('admin.users') }}" class="inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-semibold text-gray-700 shadow-sm transition hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-200 dark:hover:bg-gray-700">
                                Cancelar
                            </a>
                            <button
                                type="submit"
                                class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800"
                            >
                                Actualizar Usuario
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>