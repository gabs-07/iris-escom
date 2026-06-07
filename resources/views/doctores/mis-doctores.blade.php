<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Mis Doctores
            </h2>
            <a href="{{ route('doctores.index') }}" class="inline-flex items-center rounded-md bg-blue-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                Ver Directorio
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($doctors->isNotEmpty())
                <div class="grid gap-6 md:grid-cols-2">
                    @foreach($doctors as $relation)
                        <div class="bg-white dark:bg-gray-800 overflow-hidden rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
                            <div class="p-6">
                                <!-- Avatar -->
                                <div class="flex items-center justify-center h-16 w-16 rounded-full bg-gradient-to-br from-green-400 to-blue-500 text-white text-xl font-bold mx-auto mb-4">
                                    {{ substr($relation->doctor->name, 0, 1) }}
                                </div>

                                <!-- Información del Doctor -->
                                <div class="text-center mb-4">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $relation->doctor->name }}</h3>
                                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                                        @if ($relation->doctor->rol == 2)
                                            <span class="inline-block px-2 py-1 rounded-full bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-200 text-xs font-medium">
                                                Psicólogo
                                            </span>
                                        @else
                                            <span class="inline-block px-2 py-1 rounded-full bg-purple-100 dark:bg-purple-900/30 text-purple-800 dark:text-purple-200 text-xs font-medium">
                                                Psiquiatra
                                            </span>
                                        @endif
                                    </p>
                                </div>

                                <!-- Detalles -->
                                @if($relation->doctor->professionalCredential)
                                    <div class="mb-4 space-y-2 text-sm text-gray-600 dark:text-gray-400 bg-gray-50 dark:bg-gray-700/50 rounded-lg p-3">
                                        @if($relation->doctor->professionalCredential->years_of_experience)
                                            <div class="flex items-center">
                                                <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                <span>{{ $relation->doctor->professionalCredential->years_of_experience }} años de experiencia</span>
                                            </div>
                                        @endif
                                        @if($relation->doctor->professionalCredential->university)
                                            <div class="flex items-center">
                                                <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5m0 0l-9 5 9 5 9-5m0-5v10m0 0l-9 5m9-5l9 5m-9-5l0 10"></path>
                                                </svg>
                                                <span>{{ $relation->doctor->professionalCredential->university }}</span>
                                            </div>
                                        @endif
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7 12a5 5 0 1110 0 5 5 0 01-10 0z"></path>
                                            </svg>
                                            <span>Conectado desde {{ $relation->updated_at->format('d/m/Y') }}</span>
                                        </div>
                                    </div>
                                @endif

                                <!-- Botones de Acción -->
                                <div class="flex gap-2">
                                    <button class="flex-1 px-4 py-2 rounded-md bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-200 hover:bg-blue-200 dark:hover:bg-blue-900/50 text-sm font-medium transition">
                                        Ver Perfil
                                    </button>
                                    <button class="flex-1 px-4 py-2 rounded-md bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium transition">
                                        Contactar
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-center py-12">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                        </svg>
                        <p class="mt-4 text-gray-500 dark:text-gray-400 mb-6">No tienes doctores conectados aún.</p>
                        <a href="{{ route('doctores.index') }}" class="inline-flex items-center px-6 py-2 rounded-md bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium transition">
                            Explorar Directorio
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
