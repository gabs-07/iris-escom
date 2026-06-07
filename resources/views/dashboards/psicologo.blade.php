<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-wrap items-center justify-between gap-4">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Dashboard de Psicólogo
            </h2>

            @if (auth()->user()->is_verified_professional)
                <a href="{{ route('foro.index') }}" class="inline-flex items-center rounded-md bg-fuchsia-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-fuchsia-500 focus:outline-none focus:ring-2 focus:ring-fuchsia-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                    Foro
                </a>
            @else
                <div class="group relative">
                    <button disabled class="inline-flex items-center rounded-md bg-gray-400 px-4 py-2 text-sm font-semibold text-gray-200 shadow-sm cursor-not-allowed opacity-60">
                        Foro
                    </button>
                    <div class="absolute right-0 hidden group-hover:block bg-gray-900 text-white text-xs rounded py-2 px-3 whitespace-nowrap bottom-full mb-2 z-10">
                        Completa tu verificación profesional para acceder
                        <div class="absolute left-1/2 top-full -translate-x-1/2 border-4 border-transparent border-t-gray-900"></div>
                    </div>
                </div>
            @endif
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (!auth()->user()->professionalCredential)
                <!-- Formulario de Credenciales Profesionales -->
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
                            </div>
                        </form>
                    </div>
                </div>
            @elseif (auth()->user()->professionalCredential->isPending())
                <!-- Estado: Credenciales Pendientes de Revisión -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-center">
                        <!-- Icono de espera -->
                        <div class="mb-6">
                            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-yellow-100 dark:bg-yellow-900/30">
                                <svg class="w-8 h-8 text-yellow-600 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>

                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">
                            Credenciales Pendiente de Revisión
                        </h3>

                        <p class="text-gray-600 dark:text-gray-400 mb-6">
                            Gracias por enviar tus credenciales profesionales. Nuestro equipo de administración está revisando tu información.
                        </p>

                        <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-4 mb-6 text-left">
                            <h4 class="font-semibold text-blue-900 dark:text-blue-100 mb-2">¿Cuál es el siguiente paso?</h4>
                            <ul class="space-y-2 text-sm text-blue-800 dark:text-blue-200">
                                <li class="flex items-start">
                                    <span class="mr-3">✓</span>
                                    <span>Se revisarán todos tus datos profesionales</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="mr-3">✓</span>
                                    <span>Se verificará la autenticidad de tus credenciales</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="mr-3">✓</span>
                                    <span>Recibirás una notificación por correo cuando se complete la revisión</span>
                                </li>
                            </ul>
                        </div>

                        <div class="bg-gray-50 dark:bg-gray-700/50 rounded-lg p-4 mb-6 text-left">
                            <h4 class="font-semibold text-gray-900 dark:text-white mb-3">Información Enviada:</h4>
                            <dl class="space-y-2 text-sm">
                                <div class="flex justify-between">
                                    <dt class="text-gray-600 dark:text-gray-400">Cédula Profesional:</dt>
                                    <dd class="font-medium text-gray-900 dark:text-white">{{ auth()->user()->professionalCredential->professional_id }}</dd>
                                </div>
                                @if(auth()->user()->professionalCredential->specialty_id)
                                    <div class="flex justify-between">
                                        <dt class="text-gray-600 dark:text-gray-400">Cédula de Especialidad:</dt>
                                        <dd class="font-medium text-gray-900 dark:text-white">{{ auth()->user()->professionalCredential->specialty_id }}</dd>
                                    </div>
                                @endif
                                <div class="flex justify-between">
                                    <dt class="text-gray-600 dark:text-gray-400">Institución:</dt>
                                    <dd class="font-medium text-gray-900 dark:text-white">{{ auth()->user()->professionalCredential->university }}</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-gray-600 dark:text-gray-400">Años de Experiencia:</dt>
                                    <dd class="font-medium text-gray-900 dark:text-white">{{ auth()->user()->professionalCredential->years_of_experience }}</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-gray-600 dark:text-gray-400">Fecha de Envío:</dt>
                                    <dd class="font-medium text-gray-900 dark:text-white">{{ auth()->user()->professionalCredential->created_at->format('d/m/Y H:i') }}</dd>
                                </div>
                            </dl>
                        </div>

                        <div class="bg-amber-50 dark:bg-amber-900/20 border border-amber-200 dark:border-amber-800 rounded-lg p-4 mb-6">
                            <p class="text-sm text-amber-800 dark:text-amber-200">
                                <strong>Nota importante:</strong> No tendrás acceso a todas las funcionalidades de la aplicación hasta que tu cuenta sea aprobada. Por favor, espera la revisión.
                            </p>
                        </div>
                    </div>
                </div>
            @elseif (auth()->user()->professionalCredential->isRejected())
                <!-- Estado: Credenciales Rechazadas -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-center">
                        <!-- Icono de rechazo -->
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
                            Lamentablemente, tus credenciales no fueron aprobadas en esta ocasión.
                        </p>

                        @if(auth()->user()->professionalCredential->admin_notes)
                            <div class="bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-lg p-4 mb-6 text-left">
                                <h4 class="font-semibold text-red-900 dark:text-red-100 mb-2">Motivo del rechazo:</h4>
                                <p class="text-sm text-red-800 dark:text-red-200">{{ auth()->user()->professionalCredential->admin_notes }}</p>
                            </div>
                        @endif

                        <p class="text-gray-600 dark:text-gray-400 mb-6">
                            Puedes reenviar tus credenciales con la información corregida.
                        </p>

                        <div class="flex gap-3 justify-center">
                            <form action="{{ route('credentials.resubmit', auth()->user()->professionalCredential) }}" method="POST">
                                @csrf
                                <button type="submit" class="inline-flex items-center rounded-md bg-blue-600 px-6 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                                    Reenviar Credenciales
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @else
                <!-- Dashboard Principal -->
                <div class="space-y-6">
                    <!-- Mis Pacientes -->
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="flex items-center justify-between mb-6">
                                <div class="flex items-center gap-3">
                                    <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.856-1.487M15 10a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <h3 class="text-lg font-semibold">Mis Pacientes ({{ auth()->user()->patients()->count() }})</h3>
                                </div>
                            </div>

                            @if(auth()->user()->patients()->exists())
                                <div class="overflow-x-auto">
                                    <table class="w-full text-sm">
                                        <thead class="bg-gray-50 dark:bg-gray-700 border-b border-gray-200 dark:border-gray-600">
                                            <tr>
                                                <th class="px-4 py-3 text-left font-medium">Paciente</th>
                                                <th class="px-4 py-3 text-left font-medium">Email</th>
                                                <th class="px-4 py-3 text-left font-medium">Vinculado desde</th>
                                                <th class="px-4 py-3 text-center font-medium">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                            @foreach(auth()->user()->patients()->get() as $relation)
                                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition">
                                                    <td class="px-4 py-4">
                                                        <div class="font-medium">{{ $relation->patient->name }}</div>
                                                    </td>
                                                    <td class="px-4 py-4 text-gray-600 dark:text-gray-400">
                                                        {{ $relation->patient->email }}
                                                    </td>
                                                    <td class="px-4 py-4 text-gray-600 dark:text-gray-400">
                                                        {{ $relation->accepted_at?->format('d/m/Y') ?? $relation->updated_at->format('d/m/Y') }}
                                                    </td>
                                                    <td class="px-4 py-4">
                                                        <div class="flex items-center justify-center gap-2">
                                                            <button class="inline-flex items-center px-3 py-1 rounded-md bg-blue-100 text-blue-700 hover:bg-blue-200 dark:bg-blue-900/30 dark:text-blue-300 dark:hover:bg-blue-900/50 text-xs font-medium transition">
                                                                Ver perfil
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="text-center py-12">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                    </svg>
                                    <p class="mt-4 text-gray-500 dark:text-gray-400">No tienes pacientes vinculados aún.</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Solicitudes Pendientes -->
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="flex items-center justify-between mb-6">
                                <div class="flex items-center gap-3">
                                    <svg class="w-6 h-6 text-amber-600 dark:text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                                    </svg>
                                    <h3 class="text-lg font-semibold">Solicitudes Pendientes ({{ auth()->user()->pendingPatientRequests()->count() }})</h3>
                                </div>
                            </div>

                            @if(auth()->user()->pendingPatientRequests()->exists())
                                <div class="space-y-4">
                                    @foreach(auth()->user()->pendingPatientRequests()->get() as $request)
                                        <div class="border border-amber-200 dark:border-amber-900/30 rounded-lg p-4 bg-amber-50 dark:bg-amber-900/10">
                                            <div class="flex items-start justify-between">
                                                <div class="flex-1">
                                                    <div class="flex items-center gap-2">
                                                        <div class="flex-shrink-0">
                                                            <div class="flex items-center justify-center h-10 w-10 rounded-full bg-amber-600 text-white">
                                                                <span class="text-sm font-medium">{{ substr($request->patient->name, 0, 1) }}</span>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <p class="font-semibold text-gray-900 dark:text-white">{{ $request->patient->name }}</p>
                                                            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $request->patient->email }}</p>
                                                        </div>
                                                    </div>
                                                    <p class="mt-2 text-xs text-gray-600 dark:text-gray-400">
                                                        <span class="font-medium">Enviada:</span> {{ $request->requested_at->diffForHumans() }}
                                                    </p>
                                                </div>

                                                <div class="flex items-center gap-2 ml-4">
                                                    <form action="{{ route('doctor.solicitudes.accept', $request) }}" method="POST" class="inline">
                                                        @csrf
                                                        <button type="submit" class="inline-flex items-center gap-2 px-4 py-2 rounded-md bg-green-600 hover:bg-green-700 text-white text-sm font-medium transition focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                                            </svg>
                                                            Aceptar
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('doctor.solicitudes.reject', $request) }}" method="POST" class="inline">
                                                        @csrf
                                                        <button type="submit" class="inline-flex items-center gap-2 px-4 py-2 rounded-md bg-red-600 hover:bg-red-700 text-white text-sm font-medium transition focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                            </svg>
                                                            Rechazar
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="text-center py-12">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                    </svg>
                                    <p class="mt-4 text-gray-500 dark:text-gray-400">No hay solicitudes pendientes.</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Información General -->
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <h3 class="text-lg font-semibold mb-4">Bienvenido, {{ auth()->user()->name }}</h3>
                            <p class="text-gray-600 dark:text-gray-400">Este es tu panel de psicólogo. Aquí puedes ver tus pacientes vinculados y gestionar las solicitudes de nuevos pacientes.</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>