<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-wrap items-center justify-between gap-4">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Dashboard de Paciente
            </h2>

            <div class="flex flex-wrap gap-3">
                <a href="{{ route('diarios.index') }}" class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                    Mis diarios
                </a>
                <a href="{{ route('chats.index') }}" class="inline-flex items-center rounded-md bg-emerald-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                    Mis chats
                </a>
                <a href="{{ route('doctores.index') }}" class="inline-flex items-center rounded-md bg-sky-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                    Mis doctores
                </a>
                <a href="{{ route('foro.index') }}" class="inline-flex items-center rounded-md bg-fuchsia-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-fuchsia-500 focus:outline-none focus:ring-2 focus:ring-fuchsia-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                    Foro
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid gap-6 lg:grid-cols-3 mb-6">
                <!-- Resumen: Mis Doctores -->
                <div class="bg-gradient-to-br from-sky-50 to-blue-50 dark:from-sky-900/20 dark:to-blue-900/20 overflow-hidden rounded-lg shadow-sm border border-sky-200 dark:border-sky-800">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-sky-700 dark:text-sky-300 font-medium">Doctores Conectados</p>
                                <p class="mt-2 text-3xl font-bold text-sky-900 dark:text-sky-100">{{ auth()->user()->doctors()->count() }}</p>
                            </div>
                            <div class="h-12 w-12 bg-sky-200 dark:bg-sky-800 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-sky-600 dark:text-sky-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                                </svg>
                            </div>
                        </div>
                        <a href="{{ route('doctores.mis-doctores') }}" class="mt-4 inline-block text-sm font-medium text-sky-600 dark:text-sky-400 hover:text-sky-700 dark:hover:text-sky-300">
                            Ver detalles →
                        </a>
                    </div>
                </div>

                <!-- Resumen: Solicitudes Pendientes -->
                <div class="bg-gradient-to-br from-amber-50 to-orange-50 dark:from-amber-900/20 dark:to-orange-900/20 overflow-hidden rounded-lg shadow-sm border border-amber-200 dark:border-amber-800">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-amber-700 dark:text-amber-300 font-medium">Solicitudes Pendientes</p>
                                <p class="mt-2 text-3xl font-bold text-amber-900 dark:text-amber-100">{{ auth()->user()->pendingDoctorRequests()->count() }}</p>
                            </div>
                            <div class="h-12 w-12 bg-amber-200 dark:bg-amber-800 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-amber-600 dark:text-amber-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                                </svg>
                            </div>
                        </div>
                        <a href="{{ route('doctores.index') }}" class="mt-4 inline-block text-sm font-medium text-amber-600 dark:text-amber-400 hover:text-amber-700 dark:hover:text-amber-300">
                            Explorar directorio →
                        </a>
                    </div>
                </div>

                <!-- Acciones Rápidas -->
                <div class="bg-gradient-to-br from-indigo-50 to-purple-50 dark:from-indigo-900/20 dark:to-purple-900/20 overflow-hidden rounded-lg shadow-sm border border-indigo-200 dark:border-indigo-800">
                    <div class="p-6">
                        <p class="text-sm text-indigo-700 dark:text-indigo-300 font-medium mb-4">Acciones Rápidas</p>
                        <div class="space-y-2">
                            <a href="{{ route('doctores.index') }}" class="block px-3 py-2 rounded-md bg-indigo-100 dark:bg-indigo-900/30 text-indigo-800 dark:text-indigo-300 hover:bg-indigo-200 dark:hover:bg-indigo-900/50 text-sm font-medium text-center transition">
                                🔍 Buscar Doctor
                            </a>
                            <a href="{{ route('doctores.mis-doctores') }}" class="block px-3 py-2 rounded-md bg-indigo-100 dark:bg-indigo-900/30 text-indigo-800 dark:text-indigo-300 hover:bg-indigo-200 dark:hover:bg-indigo-900/50 text-sm font-medium text-center transition">
                                👥 Ver Mis Doctores
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mis Doctores Conectados (Vista Rápida) -->
            @if(auth()->user()->doctors()->exists())
                <div class="bg-white dark:bg-gray-800 overflow-hidden rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 mb-6">
                    <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Mis Doctores</h3>
                    </div>
                    <div class="p-6">
                        <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
                            @foreach(auth()->user()->doctors()->get() as $relation)
                                <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4 hover:shadow-md transition">
                                    <div class="flex items-start justify-between mb-3">
                                        <div class="flex-1">
                                            <h4 class="font-semibold text-gray-900 dark:text-white">{{ $relation->doctor->name }}</h4>
                                            <p class="text-xs text-gray-600 dark:text-gray-400 mt-1">
                                                @if($relation->doctor->rol == 2)
                                                    Psicólogo
                                                @else
                                                    Psiquiatra
                                                @endif
                                            </p>
                                        </div>
                                        <div class="h-10 w-10 rounded-full bg-sky-100 dark:bg-sky-900/30 flex items-center justify-center text-sky-700 dark:text-sky-300 font-bold">
                                            {{ substr($relation->doctor->name, 0, 1) }}
                                        </div>
                                    </div>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mb-3">
                                        Conectado desde {{ $relation->updated_at->format('d/m/Y') }}
                                    </p>
                                    <button class="w-full px-3 py-2 text-xs rounded-md bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 hover:bg-blue-200 dark:hover:bg-blue-900/50 font-medium transition">
                                        Contactar
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            <!-- Información -->
            <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-4">
                <p class="text-sm text-blue-800 dark:text-blue-200">
                    <strong>💡 Consejo:</strong> Conecta con doctores para que puedan ver tu información médica y seguimiento. Puedes gestionar múltiples doctores simultáneamente.
                </p>
            </div>
        </div>
    </div>
</x-app-layout>