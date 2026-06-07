<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Credenciales Rechazadas
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-center">
                    <!-- Icono de error -->
                    <div class="mb-6">
                        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-red-100 dark:bg-red-900/30">
                            <svg class="w-8 h-8 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </div>
                    </div>

                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">
                        Credenciales Rechazadas
                    </h3>

                    <p class="text-gray-600 dark:text-gray-400 mb-6">
                        Lamentablemente, tu solicitud de verificación fue rechazada por nuestro equipo de administración.
                    </p>

                    <div class="bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-lg p-4 mb-6 text-left">
                        <h4 class="font-semibold text-red-900 dark:text-red-100 mb-2">Razón del Rechazo:</h4>
                        <p class="text-sm text-red-800 dark:text-red-200">
                            {{ $credential->admin_notes ?? 'No se proporcionó una razón.' }}
                        </p>
                    </div>

                    <div class="bg-gray-50 dark:bg-gray-700/50 rounded-lg p-4 mb-6 text-left">
                        <h4 class="font-semibold text-gray-900 dark:text-white mb-3">Información Anterior:</h4>
                        <dl class="space-y-2 text-sm">
                            <div class="flex justify-between">
                                <dt class="text-gray-600 dark:text-gray-400">Cédula Profesional:</dt>
                                <dd class="font-medium text-gray-900 dark:text-white">{{ $credential->professional_id }}</dd>
                            </div>
                            @if($credential->specialty_id)
                                <div class="flex justify-between">
                                    <dt class="text-gray-600 dark:text-gray-400">Cédula de Especialidad:</dt>
                                    <dd class="font-medium text-gray-900 dark:text-white">{{ $credential->specialty_id }}</dd>
                                </div>
                            @endif
                            <div class="flex justify-between">
                                <dt class="text-gray-600 dark:text-gray-400">Institución:</dt>
                                <dd class="font-medium text-gray-900 dark:text-white">{{ $credential->university }}</dd>
                            </div>
                            <div class="flex justify-between">
                                <dt class="text-gray-600 dark:text-gray-400">Fecha de Revisión:</dt>
                                <dd class="font-medium text-gray-900 dark:text-white">{{ $credential->reviewed_at?->format('d/m/Y H:i') ?? 'N/A' }}</dd>
                            </div>
                        </dl>
                    </div>

                    <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-4 mb-6">
                        <h4 class="font-semibold text-blue-900 dark:text-blue-100 mb-2">¿Qué puedo hacer?</h4>
                        <p class="text-sm text-blue-800 dark:text-blue-200">
                            Puedes revisar el motivo del rechazo e intentar enviar tus credenciales nuevamente con la información corregida. Asegúrate de que todos los documentos sean válidos y estén correctamente escaneados.
                        </p>
                    </div>

                    <div class="flex gap-3 justify-center flex-wrap">
                        <form action="{{ route('credentials.resubmit', $credential) }}" method="POST" class="inline">
                            @csrf
                            @method('POST')
                            <button type="button" onclick="document.getElementById('resubmitForm').style.display = 'block'" class="inline-flex items-center rounded-md bg-blue-600 px-6 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                                Reenviar Credenciales
                            </button>
                        </form>
                        <a href="{{ route('dashboard') }}" class="inline-flex items-center rounded-md bg-gray-300 dark:bg-gray-600 px-6 py-2 text-sm font-semibold text-gray-900 dark:text-white shadow-sm transition hover:bg-gray-400 dark:hover:bg-gray-700 focus:outline-none">
                            Volver al Dashboard
                        </a>
                    </div>

                    <!-- Formulario de reenvío (oculto inicialmente) -->
                    <div id="resubmitForm" style="display: none;" class="mt-8 bg-gray-50 dark:bg-gray-700/50 rounded-lg p-6 border border-gray-200 dark:border-gray-600">
                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Reenviar Credenciales Corregidas</h4>
                        
                        <form action="{{ route('credentials.resubmit', $credential) }}" method="POST" enctype="multipart/form-data" class="space-y-4 text-left">
                            @csrf

                            <div>
                                <label for="professional_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    Cédula Profesional <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="professional_id" id="professional_id" 
                                    value="{{ old('professional_id', $credential->professional_id) }}"
                                    class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    required>
                                @error('professional_id')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="university" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    Institución <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="university" id="university" 
                                    value="{{ old('university', $credential->university) }}"
                                    class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    required>
                                @error('university')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="years_of_experience" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    Años de Experiencia <span class="text-red-500">*</span>
                                </label>
                                <input type="number" name="years_of_experience" id="years_of_experience" 
                                    value="{{ old('years_of_experience', $credential->years_of_experience) }}"
                                    min="0" max="70"
                                    class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    required>
                                @error('years_of_experience')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="professional_associations" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    Asociaciones Profesionales <span class="text-red-500">*</span>
                                </label>
                                <textarea name="professional_associations" id="professional_associations" 
                                    rows="3"
                                    class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    required>{{ old('professional_associations', $credential->professional_associations) }}</textarea>
                                @error('professional_associations')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="credential_file" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    Nuevo archivo de cédula (opcional)
                                </label>
                                <input type="file" name="credential_file" id="credential_file" 
                                    accept="image/jpeg,image/png,application/pdf"
                                    class="block w-full text-sm text-gray-500 dark:text-gray-400
                                        file:mr-4 file:py-2 file:px-4
                                        file:rounded-md file:border-0
                                        file:text-sm file:font-semibold
                                        file:bg-blue-50 file:text-blue-700
                                        dark:file:bg-blue-900/30 dark:file:text-blue-300">
                                @error('credential_file')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Si no cargas uno nuevo, se usará el anterior</p>
                            </div>

                            <div class="flex gap-3 justify-center pt-4">
                                <button type="submit" class="inline-flex items-center rounded-md bg-blue-600 px-6 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                                    Enviar de Nuevo
                                </button>
                                <button type="button" onclick="document.getElementById('resubmitForm').style.display = 'none'" class="inline-flex items-center rounded-md bg-gray-300 dark:bg-gray-600 px-6 py-2 text-sm font-semibold text-gray-900 dark:text-white shadow-sm transition hover:bg-gray-400 dark:hover:bg-gray-700 focus:outline-none">
                                    Cancelar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
