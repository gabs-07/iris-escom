<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-wrap items-center justify-between gap-4">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Revisión de Credenciales Profesionales
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <!-- Filtros y estadísticas -->
                    <div class="mb-6 grid grid-cols-1 gap-4 sm:grid-cols-3">
                        <div class="bg-yellow-50 dark:bg-yellow-900/20 rounded-lg p-4 border border-yellow-200 dark:border-yellow-800">
                            <p class="text-sm text-yellow-600 dark:text-yellow-400 font-medium">Pendientes</p>
                            <p class="text-2xl font-bold text-yellow-900 dark:text-yellow-100">
                                {{ $credentials->where('status', 'pending')->count() }}
                            </p>
                        </div>
                        <div class="bg-green-50 dark:bg-green-900/20 rounded-lg p-4 border border-green-200 dark:border-green-800">
                            <p class="text-sm text-green-600 dark:text-green-400 font-medium">Aprobadas</p>
                            <p class="text-2xl font-bold text-green-900 dark:text-green-100">
                                {{ $credentials->where('status', 'approved')->count() }}
                            </p>
                        </div>
                        <div class="bg-red-50 dark:bg-red-900/20 rounded-lg p-4 border border-red-200 dark:border-red-800">
                            <p class="text-sm text-red-600 dark:text-red-400 font-medium">Rechazadas</p>
                            <p class="text-2xl font-bold text-red-900 dark:text-red-100">
                                {{ $credentials->where('status', 'rejected')->count() }}
                            </p>
                        </div>
                    </div>

                    <!-- Tabla de credenciales -->
                    @if($credentials->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm">
                                <thead class="bg-gray-100 dark:bg-gray-700">
                                    <tr>
                                        <th class="px-4 py-3 text-left font-semibold text-gray-900 dark:text-white">Usuario</th>
                                        <th class="px-4 py-3 text-left font-semibold text-gray-900 dark:text-white">Cédula</th>
                                        <th class="px-4 py-3 text-left font-semibold text-gray-900 dark:text-white">Estado</th>
                                        <th class="px-4 py-3 text-left font-semibold text-gray-900 dark:text-white">Fecha</th>
                                        <th class="px-4 py-3 text-left font-semibold text-gray-900 dark:text-white">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                    @foreach($credentials as $credential)
                                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50">
                                            <td class="px-4 py-3">
                                                <div class="flex items-center gap-2">
                                                    <div>
                                                        <p class="font-medium text-gray-900 dark:text-white">{{ $credential->user->name }}</p>
                                                        <p class="text-xs text-gray-500 dark:text-gray-400">{{ $credential->user->email }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-4 py-3 text-gray-900 dark:text-white">{{ $credential->professional_id }}</td>
                                            <td class="px-4 py-3">
                                                @if($credential->status === 'pending')
                                                    <span class="inline-flex items-center rounded-full bg-yellow-100 dark:bg-yellow-900/30 px-3 py-1 text-xs font-medium text-yellow-800 dark:text-yellow-200">
                                                        Pendiente
                                                    </span>
                                                @elseif($credential->status === 'approved')
                                                    <span class="inline-flex items-center rounded-full bg-green-100 dark:bg-green-900/30 px-3 py-1 text-xs font-medium text-green-800 dark:text-green-200">
                                                        Aprobada
                                                    </span>
                                                @else
                                                    <span class="inline-flex items-center rounded-full bg-red-100 dark:bg-red-900/30 px-3 py-1 text-xs font-medium text-red-800 dark:text-red-200">
                                                        Rechazada
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="px-4 py-3 text-gray-500 dark:text-gray-400">
                                                {{ $credential->created_at->format('d/m/Y') }}
                                            </td>
                                            <td class="px-4 py-3">
                                                <a href="{{ route('admin.credentials.show', $credential) }}" class="inline-flex items-center rounded-md bg-blue-600 px-3 py-1.5 text-xs font-semibold text-white shadow-sm transition hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                                                    Ver
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Paginación -->
                        <div class="mt-6">
                            {{ $credentials->links() }}
                        </div>
                    @else
                        <div class="text-center py-12">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">No hay credenciales</h3>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">No hay solicitudes de credenciales para revisar.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
