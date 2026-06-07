<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-wrap items-center justify-between gap-4">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    Mi Perfil
                </h2>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Visualiza y gestiona tu información de perfil.</p>
            </div>

            <a href="{{ route('profile.edit') }}" class="inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-semibold text-gray-700 shadow-sm transition hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-200 dark:hover:bg-gray-700">
                Editar Perfil
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="grid gap-6">
                <!-- Información Personal -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-lg font-semibold mb-6">Información Personal</h3>
                        
                        <div class="space-y-4">
                            <div>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Nombre</p>
                                <p class="text-base font-medium text-gray-900 dark:text-white">{{ Auth::user()->name }}</p>
                            </div>

                            <div>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Email</p>
                                <p class="text-base font-medium text-gray-900 dark:text-white">{{ Auth::user()->email }}</p>
                                @if (Auth::user()->email_verified_at)
                                    <p class="text-xs text-green-600 dark:text-green-400 mt-1">✓ Email verificado</p>
                                @else
                                    <p class="text-xs text-yellow-600 dark:text-yellow-400 mt-1">⚠ Email sin verificar</p>
                                @endif
                            </div>

                            <div>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Rol</p>
                                <div class="mt-1">
                                    @switch(Auth::user()->rol)
                                        @case(1)
                                            <span class="inline-flex items-center rounded-full bg-blue-100 dark:bg-blue-900 px-3 py-1 text-sm font-medium text-blue-800 dark:text-blue-200">
                                                Paciente
                                            </span>
                                            @break
                                        @case(2)
                                            <span class="inline-flex items-center rounded-full bg-green-100 dark:bg-green-900 px-3 py-1 text-sm font-medium text-green-800 dark:text-green-200">
                                                Psicólogo
                                            </span>
                                            @break
                                        @case(3)
                                            <span class="inline-flex items-center rounded-full bg-purple-100 dark:bg-purple-900 px-3 py-1 text-sm font-medium text-purple-800 dark:text-purple-200">
                                                Psiquiatra
                                            </span>
                                            @break
                                        @default
                                            <span class="inline-flex items-center rounded-full bg-gray-100 dark:bg-gray-900 px-3 py-1 text-sm font-medium text-gray-800 dark:text-gray-200">
                                                Sin asignar
                                            </span>
                                    @endswitch
                                </div>
                            </div>

                            <div>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Miembro desde</p>
                                <p class="text-base font-medium text-gray-900 dark:text-white">
                                    {{ Auth::user()->created_at->format('d \\d\\e M\\a\\y \\d\\e Y') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Datos de Seguridad -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-lg font-semibold mb-4">Seguridad</h3>
                        
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-900 dark:text-white">Contraseña</p>
                                    <p class="text-xs text-gray-600 dark:text-gray-400">Cambia tu contraseña regularmente para mantener tu cuenta segura.</p>
                                </div>
                                <a href="{{ route('password.request') }}" class="inline-flex items-center rounded-md border border-gray-300 bg-white px-3 py-1.5 text-xs font-semibold text-gray-700 shadow-sm transition hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-200 dark:hover:bg-gray-700">
                                    Cambiar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Zona de Peligro -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border border-red-200 dark:border-red-900">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h3 class="text-lg font-semibold mb-4 text-red-600 dark:text-red-400">Zona de Peligro</h3>
                        
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">Una vez que elimines tu cuenta, no hay vuelta atrás. Por favor, asegúrate de estar completamente seguro.</p>
                            <a href="{{ route('profile.edit') }}" class="inline-flex items-center rounded-md border border-red-500 bg-transparent px-4 py-2 text-sm font-semibold text-red-600 shadow-sm transition hover:bg-red-50 dark:hover:bg-red-950">
                                Eliminar Cuenta
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>