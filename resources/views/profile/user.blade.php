<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-wrap items-center justify-between gap-4">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    Perfil de {{ $user->name }}
                </h2>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Información pública del usuario.</p>
            </div>

            <a href="{{ route('foro.index') }}" class="inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-semibold text-gray-700 shadow-sm transition hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-200 dark:hover:bg-gray-700">
                Volver al foro
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="grid gap-6">
                <!-- Información Personal -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="flex h-20 w-20 items-center justify-center rounded-full bg-gradient-to-br from-blue-600 to-purple-600 text-2xl font-semibold text-white">
                                {{ strtoupper(mb_substr($user->name, 0, 1)) }}
                            </div>
                            <div>
                                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">{{ $user->name }}</h1>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Miembro desde {{ $user->created_at->format('d \\d\\e M\\a\\y \\d\\e Y') }}</p>
                            </div>
                        </div>

                        <div class="border-t border-gray-200 dark:border-gray-700 pt-6">
                            <h3 class="text-lg font-semibold mb-4 text-gray-900 dark:text-white">Información Pública</h3>
                            
                            <div class="space-y-4">
                                <div>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">Email</p>
                                    <p class="text-base font-medium text-gray-900 dark:text-white">{{ $user->email }}</p>
                                </div>

                                <div>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">Rol</p>
                                    <div class="mt-1">
                                        @switch($user->rol)
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

                                <div>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">Miembro desde</p>
                                    <p class="text-base font-medium text-gray-900 dark:text-white">
                                        {{ $user->created_at->format('d \\d\\e M\\a\\y \\d\\e Y') }}
                                    </p>
                                    <p class="text-xs text-gray-600 dark:text-gray-400 mt-1">Hace {{ $user->created_at->diffInDays() }} días</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Estado -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h3 class="text-lg font-semibold mb-4">Estado</h3>
                        <div class="flex items-center gap-3">
                            <div class="h-3 w-3 rounded-full bg-green-500"></div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Usuario activo</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>