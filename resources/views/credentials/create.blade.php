<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Verificación de Credenciales Profesionales
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold mb-2">Información Importante</h3>
                        <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-4">
                            <p class="text-sm text-blue-800 dark:text-blue-200">
                                Tu perfil está pendiente de activación. Completa los siguientes campos con tus datos profesionales para que nuestro equipo de administración pueda revisar y aprobar tu cuenta. Mientras tu cuenta no sea aprobada, no tendrás acceso a la aplicación.
                            </p>
                        </div>
                    </div>

                    <form action="{{ route('credentials.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf

                        <!-- Cédula Profesional -->
                        <div>
                            <label for="professional_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                Cédula Profesional <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="professional_id" id="professional_id" 
                                placeholder="Ej.: 12345678"
                                value="{{ old('professional_id') }}"
                                class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 @error('professional_id') border-red-500 @enderror"
                                required>
                            @error('professional_id')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Emitida por la SEP o una entidad equivalente.</p>
                        </div>

                        <!-- Cédula de Especialidad -->
                        <div>
                            <label for="specialty_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                Cédula de Especialidad
                            </label>
                            <input type="text" name="specialty_id" id="specialty_id" 
                                placeholder="Ej.: ESP-12345678"
                                value="{{ old('specialty_id') }}"
                                class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 @error('specialty_id') border-red-500 @enderror">
                            @error('specialty_id')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">(Si aplica)</p>
                        </div>

                        <!-- Institución Licenciatura -->
                        <div>
                            <label for="university" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                Institución donde cursaste tu licenciatura <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="university" id="university" 
                                placeholder="Ej.: UNAM, Universidad Iberoamericana, UAM…"
                                value="{{ old('university') }}"
                                class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 @error('university') border-red-500 @enderror"
                                required>
                            @error('university')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Posgrado / Especialización -->
                        <div>
                            <label for="postgraduate" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                Posgrado / Especialización
                            </label>
                            <input type="text" name="postgraduate" id="postgraduate" 
                                placeholder="Ej.: Maestría en Psicología Clínica"
                                value="{{ old('postgraduate') }}"
                                class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 @error('postgraduate') border-red-500 @enderror">
                            @error('postgraduate')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Años de Experiencia -->
                        <div>
                            <label for="years_of_experience" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                Años de experiencia clínica <span class="text-red-500">*</span>
                            </label>
                            <input type="number" name="years_of_experience" id="years_of_experience" 
                                min="0" max="70"
                                placeholder="Ej.: 5"
                                value="{{ old('years_of_experience') }}"
                                class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 @error('years_of_experience') border-red-500 @enderror"
                                required>
                            @error('years_of_experience')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Asociaciones Profesionales -->
                        <div>
                            <label for="professional_associations" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                Asociaciones o colegios profesionales <span class="text-red-500">*</span>
                            </label>
                            <textarea name="professional_associations" id="professional_associations" 
                                rows="4"
                                placeholder="Incluye las instituciones o colegios a los que estás afiliado"
                                class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 @error('professional_associations') border-red-500 @enderror"
                                required>{{ old('professional_associations') }}</textarea>
                            @error('professional_associations')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Cédula Profesional (Archivo) -->
                        <div>
                            <label for="credential_file" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                Sube tu cédula profesional <span class="text-red-500">*</span>
                            </label>
                            <input type="file" name="credential_file" id="credential_file" 
                                accept="image/jpeg,image/png,application/pdf"
                                class="block w-full text-sm text-gray-500 dark:text-gray-400
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-md file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-blue-50 file:text-blue-700
                                    dark:file:bg-blue-900/30 dark:file:text-blue-300
                                    hover:file:bg-blue-100 dark:hover:file:bg-blue-900/50
                                    @error('credential_file') border-red-500 @enderror"
                                required>
                            @error('credential_file')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">JPG, PNG o PDF. Máximo 5 MB. Adjunta el archivo escaneado o foto.</p>
                        </div>

                        <!-- Botones -->
                        <div class="flex gap-3 pt-6">
                            <button type="submit" class="inline-flex items-center rounded-md bg-blue-600 px-6 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                                Enviar Credenciales
                            </button>
                            <a href="{{ route('dashboard') }}" class="inline-flex items-center rounded-md bg-gray-300 dark:bg-gray-600 px-6 py-2 text-sm font-semibold text-gray-900 dark:text-white shadow-sm transition hover:bg-gray-400 dark:hover:bg-gray-700 focus:outline-none">
                                Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
