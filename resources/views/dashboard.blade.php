<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                <!-- Tarjeta de Bienvenida -->
                <div class="col-span-full bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <p class="text-lg font-semibold">¡Bienvenido, {{ Auth::user()->name }}!</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">{{ __("You're logged in!") }}</p>
                    </div>
                </div>

                <!-- Tarjeta de Perfil -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg hover:shadow-md transition-shadow">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="flex h-12 w-12 items-center justify-center rounded-full bg-blue-100 dark:bg-blue-900 text-sm font-semibold text-blue-700 dark:text-blue-200">
                                {{ strtoupper(mb_substr(Auth::user()->name, 0, 1)) }}
                            </div>
                            <div>
                                <p class="font-semibold">Mi Perfil</p>
                                <p class="text-xs text-gray-600 dark:text-gray-400">Gestiona tu información</p>
                            </div>
                        </div>
                        <a href="{{ route('profile.show') }}" class="inline-flex items-center rounded-md bg-blue-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-blue-700">
                            Ver Perfil
                        </a>
                    </div>
                </div>

                <!-- Tarjeta de Rol -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-3">Tu Rol:</p>
                        <div>
                            @switch(Auth::user()->rol)
                                @case(1)
                                    <span class="inline-flex items-center rounded-full bg-blue-100 dark:bg-blue-900 px-3 py-1 text-sm font-medium text-blue-800 dark:text-blue-200">
                                        👨‍⚕️ Paciente
                                    </span>
                                    @break
                                @case(2)
                                    <span class="inline-flex items-center rounded-full bg-green-100 dark:bg-green-900 px-3 py-1 text-sm font-medium text-green-800 dark:text-green-200">
                                        🧑‍⚕️ Psicólogo
                                    </span>
                                    @break
                                @case(3)
                                    <span class="inline-flex items-center rounded-full bg-purple-100 dark:bg-purple-900 px-3 py-1 text-sm font-medium text-purple-800 dark:text-purple-200">
                                        👨‍⚕️ Psiquiatra
                                    </span>
                                    @break
                                @default
                                    <span class="inline-flex items-center rounded-full bg-gray-100 dark:bg-gray-900 px-3 py-1 text-sm font-medium text-gray-800 dark:text-gray-200">
                                        Sin asignar
                                    </span>
                            @endswitch
                        </div>
                    </div>
                </div>

                <!-- Tarjeta de Miembro desde -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-3">Miembro desde:</p>
                        <p class="text-lg font-semibold">{{ Auth::user()->created_at->format('d/m/Y') }}</p>
                        <p class="text-xs text-gray-600 dark:text-gray-400 mt-1">Hace {{ Auth::user()->created_at->diffInDays() }} días</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
