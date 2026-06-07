<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Directorio de Profesionales
            </h2>
            <a href="{{ route('doctores.mis-doctores') }}" class="inline-flex items-center rounded-md bg-blue-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                Mis Doctores
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Mensajes -->
            @if ($errors->any())
                <div class="mb-4 rounded-lg bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-red-800 dark:text-red-200">Error</h3>
                            <div class="mt-2 text-sm text-red-700 dark:text-red-300">
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if (session('success'))
                <div class="mb-4 rounded-lg bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-green-800 dark:text-green-200">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Información -->
            <div class="mb-6 bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-4">
                <h3 class="font-semibold text-blue-900 dark:text-blue-100 mb-2">¿Cómo funciona?</h3>
                <p class="text-sm text-blue-800 dark:text-blue-200">
                    Encuentra profesionales verificados y solicita vincularte con ellos. Los doctores revisarán tu solicitud y podrán aceptarla o rechazarla. Una vez aceptada, podrán acceder a tu información médica y comunicarse contigo.
                </p>
            </div>

            <!-- Grid de Doctores -->
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                @forelse($doctors as $doctor)
                    <div class="bg-white dark:bg-gray-800 overflow-hidden rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 hover:shadow-md transition">
                        <div class="p-6">
                            <!-- Avatar -->
                            <div class="flex items-center justify-center h-16 w-16 rounded-full bg-gradient-to-br from-blue-400 to-purple-500 text-white text-xl font-bold mx-auto mb-4">
                                {{ substr($doctor->name, 0, 1) }}
                            </div>

                            <!-- Información del Doctor -->
                            <div class="text-center mb-4">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $doctor->name }}</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                                    @if ($doctor->rol == 2)
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
                            @if($doctor->professionalCredential)
                                <div class="mb-4 space-y-2 text-sm text-gray-600 dark:text-gray-400">
                                    @if($doctor->professionalCredential->years_of_experience)
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                            </svg>
                                            <span>{{ $doctor->professionalCredential->years_of_experience }} años de experiencia</span>
                                        </div>
                                    @endif
                                    @if($doctor->professionalCredential->university)
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                            </svg>
                                            <span>{{ $doctor->professionalCredential->university }}</span>
                                        </div>
                                    @endif
                                </div>
                            @endif

                            <!-- Estado y Botones -->
                            <div class="flex flex-col gap-2">
                                @if(in_array($doctor->id, $connectedDoctorIds))
                                    <div class="w-full text-center px-4 py-2 rounded-md bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-200 text-sm font-medium">
                                        ✓ Conectado
                                    </div>
                                @elseif(in_array($doctor->id, $pendingRequests))
                                    <div class="w-full text-center px-4 py-2 rounded-md bg-yellow-100 dark:bg-yellow-900/30 text-yellow-800 dark:text-yellow-200 text-sm font-medium">
                                        ⏳ Solicitud Pendiente
                                    </div>
                                    <form action="{{ route('doctores.cancel', $doctor->id) }}" method="POST" class="w-full">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-full px-4 py-2 rounded-md bg-red-100 dark:bg-red-900/30 text-red-800 dark:text-red-200 hover:bg-red-200 dark:hover:bg-red-900/50 text-sm font-medium transition">
                                            Cancelar Solicitud
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('doctores.store', $doctor) }}" method="POST" class="w-full">
                                        @csrf
                                        <button type="submit" class="w-full px-4 py-2 rounded-md bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium transition focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                                            Solicitar Vinculación
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                        </svg>
                        <p class="mt-4 text-gray-500 dark:text-gray-400">No hay profesionales disponibles en este momento.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
