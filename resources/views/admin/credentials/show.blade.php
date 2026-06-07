<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between gap-4">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Revisar Credencial Profesional
            </h2>
            <a href="{{ route('admin.credentials.index') }}" class="inline-flex items-center rounded-md bg-gray-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                Volver
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <!-- Información del Usuario -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Información del Usuario</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Nombre</p>
                            <p class="font-medium text-gray-900 dark:text-white">{{ $credential->user->name }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Email</p>
                            <p class="font-medium text-gray-900 dark:text-white">{{ $credential->user->email }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Rol</p>
                            <p class="font-medium text-gray-900 dark:text-white capitalize">{{ $credential->user->rol }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Fecha de Registro</p>
                            <p class="font-medium text-gray-900 dark:text-white">{{ $credential->user->created_at->format('d/m/Y H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Información de Credenciales -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Información Profesional</h3>
                    <div class="space-y-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Cédula Profesional</p>
                                <p class="font-medium text-gray-900 dark:text-white">{{ $credential->professional_id }}</p>
                            </div>
                            @if($credential->specialty_id)
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Cédula de Especialidad</p>
                                    <p class="font-medium text-gray-900 dark:text-white">{{ $credential->specialty_id }}</p>
                                </div>
                            @endif
                        </div>

                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Institución de Licenciatura</p>
                            <p class="font-medium text-gray-900 dark:text-white">{{ $credential->university }}</p>
                        </div>

                        @if($credential->postgraduate)
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Posgrado / Especialización</p>
                                <p class="font-medium text-gray-900 dark:text-white">{{ $credential->postgraduate }}</p>
                            </div>
                        @endif

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Años de Experiencia</p>
                                <p class="font-medium text-gray-900 dark:text-white">{{ $credential->years_of_experience }} años</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Fecha de Envío</p>
                                <p class="font-medium text-gray-900 dark:text-white">{{ $credential->created_at->format('d/m/Y H:i') }}</p>
                            </div>
                        </div>

                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Asociaciones Profesionales</p>
                            <p class="font-medium text-gray-900 dark:text-white whitespace-pre-wrap">{{ $credential->professional_associations }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Archivo de Credencial -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Documento de Cédula</h3>
                    <div class="bg-gray-100 dark:bg-gray-700 rounded-lg p-4">
                        @php
                            $fileExt = pathinfo($credential->credential_file_path, PATHINFO_EXTENSION);
                        @endphp

                        @if(in_array($fileExt, ['jpg', 'jpeg', 'png']))
                            <img src="{{ asset('storage/' . $credential->credential_file_path) }}" 
                                alt="Cédula Profesional" 
                                class="max-w-full max-h-96 mx-auto rounded-lg">
                        @else
                            <div class="text-center py-8">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <p class="mt-2 text-gray-600 dark:text-gray-400">Documento PDF</p>
                            </div>
                        @endif

                        <a href="{{ asset('storage/' . $credential->credential_file_path) }}" 
                            target="_blank"
                            class="mt-4 inline-flex items-center rounded-md bg-blue-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                            Descargar archivo
                        </a>
                    </div>
                </div>
            </div>

            <!-- Estado y Acciones -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Estado de la Solicitud</h3>
                    
                    <div class="mb-6">
                        <p class="text-sm text-gray-500 dark:text-gray-400 mb-2">Estado Actual:</p>
                        <div class="inline-flex items-center rounded-full px-4 py-2
                            @if($credential->status === 'pending')
                                bg-yellow-100 dark:bg-yellow-900/30 text-yellow-800 dark:text-yellow-200
                            @elseif($credential->status === 'approved')
                                bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-200
                            @else
                                bg-red-100 dark:bg-red-900/30 text-red-800 dark:text-red-200
                            @endif
                            font-semibold">
                            @if($credential->status === 'pending')
                                Pendiente de Revisión
                            @elseif($credential->status === 'approved')
                                Aprobada
                            @else
                                Rechazada
                            @endif
                        </div>
                    </div>

                    @if($credential->admin_notes)
                        <div class="mb-6 p-4 bg-gray-50 dark:bg-gray-700/50 rounded-lg border border-gray-200 dark:border-gray-600">
                            <p class="text-sm text-gray-600 dark:text-gray-400 font-medium mb-2">Notas del Administrador:</p>
                            <p class="text-gray-700 dark:text-gray-300 whitespace-pre-wrap">{{ $credential->admin_notes }}</p>
                        </div>
                    @endif

                    @if($credential->reviewed_at)
                        <div class="mb-6">
                            <p class="text-sm text-gray-500 dark:text-gray-400">Revisado por: <span class="font-medium text-gray-900 dark:text-white">{{ $credential->reviewedByUser?->name ?? 'Admin' }}</span></p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Fecha: <span class="font-medium text-gray-900 dark:text-white">{{ $credential->reviewed_at->format('d/m/Y H:i') }}</span></p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Acciones (solo si está pendiente) -->
            @if($credential->status === 'pending')
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Acciones</h3>

                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <!-- Aprobar -->
                            <form action="{{ route('admin.credentials.approve', $credential) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas aprobar esta credencial?');">
                                @csrf
                                <div class="mb-4">
                                    <label for="admin_notes_approve" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                        Notas (opcional)
                                    </label>
                                    <textarea name="admin_notes" id="admin_notes_approve" 
                                        rows="3"
                                        placeholder="Notas adicionales sobre la aprobación..."
                                        class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-green-500"></textarea>
                                </div>
                                <button type="submit" class="w-full inline-flex items-center justify-center rounded-md bg-green-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                    Aprobar
                                </button>
                            </form>

                            <!-- Rechazar -->
                            <form action="{{ route('admin.credentials.reject', $credential) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas rechazar esta credencial?');">
                                @csrf
                                <div class="mb-4">
                                    <label for="admin_notes_reject" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                        Razón del rechazo <span class="text-red-500">*</span>
                                    </label>
                                    <textarea name="admin_notes" id="admin_notes_reject" 
                                        rows="3"
                                        placeholder="Explica por qué se rechaza esta credencial..."
                                        class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-red-500"
                                        required></textarea>
                                    @error('admin_notes')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                                <button type="submit" class="w-full inline-flex items-center justify-center rounded-md bg-red-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                    Rechazar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
