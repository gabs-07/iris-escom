<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Estado de Verificación
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
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
                                <dt class="text-gray-600 dark:text-gray-400">Años de Experiencia:</dt>
                                <dd class="font-medium text-gray-900 dark:text-white">{{ $credential->years_of_experience }}</dd>
                            </div>
                            <div class="flex justify-between">
                                <dt class="text-gray-600 dark:text-gray-400">Fecha de Envío:</dt>
                                <dd class="font-medium text-gray-900 dark:text-white">{{ $credential->created_at->format('d/m/Y H:i') }}</dd>
                            </div>
                        </dl>
                    </div>

                    <div class="bg-amber-50 dark:bg-amber-900/20 border border-amber-200 dark:border-amber-800 rounded-lg p-4 mb-6">
                        <p class="text-sm text-amber-800 dark:text-amber-200">
                            <strong>Nota importante:</strong> No tendrás acceso a la aplicación hasta que tu cuenta sea aprobada. Por favor, espera la revisión.
                        </p>
                    </div>

                    <div class="flex gap-3 justify-center">
                        <a href="{{ route('dashboard') }}" class="inline-flex items-center rounded-md bg-blue-600 px-6 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                            Volver al Dashboard
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
