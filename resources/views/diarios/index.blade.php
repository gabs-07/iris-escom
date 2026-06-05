<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-wrap items-center justify-between gap-4">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    Mis diarios
                </h2>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Consulta tus registros y crea el diario del día actual.</p>
                <p class="mt-2 text-sm {{ $todayDiary ? 'text-green-700 dark:text-green-400' : 'text-gray-600 dark:text-gray-300' }}">
                    @if ($todayDiary)
                        Ya existe un diario guardado para hoy. Solo podrás crear uno por fecha.
                    @else
                        Todavía no has creado el diario de hoy. Puedes hacerlo mientras la fecha actual esté vigente.
                    @endif
                </p>
            </div>

            <div class="flex flex-wrap items-center gap-3">
                <a href="{{ route('diarios.create') }}" class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-500">
                    Crear diario de hoy
                </a>
                @if ($todayDiary)
                    <a href="{{ route('diarios.show', $todayDiary) }}" class="inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-semibold text-gray-700 shadow-sm transition hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-200 dark:hover:bg-gray-700">
                        Ver diario de hoy
                    </a>
                @else
                    <span class="inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-semibold text-gray-400 shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-500">
                        Ver diario de hoy
                    </span>
                @endif
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if (session('status'))
                <div class="rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800 dark:border-green-900 dark:bg-green-900/30 dark:text-green-200">
                    {{ session('status') }}
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 space-y-4">
                    @forelse ($diaries as $diario)
                        <a href="{{ route('diarios.show', $diario) }}" class="block rounded-lg border border-gray-200 p-4 transition hover:border-indigo-300 hover:bg-indigo-50/60 dark:border-gray-700 dark:hover:border-indigo-500 dark:hover:bg-gray-900/60">
                            <div class="flex items-center justify-between gap-4">
                                <div>
                                    <p class="text-sm font-semibold text-gray-900 dark:text-white">{{ $diario->fecha->format('d/m/Y') }}</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">Creado {{ $diario->created_at->format('d/m/Y H:i') }}</p>
                                </div>
                                <span class="text-sm font-medium text-indigo-600 dark:text-indigo-400">Abrir</span>
                            </div>
                            <p class="mt-3 text-sm text-gray-600 dark:text-gray-300">{{ \Illuminate\Support\Str::limit($diario->contenido, 180) }}</p>
                        </a>
                    @empty
                        <p class="text-sm text-gray-600 dark:text-gray-300">Aún no tienes diarios guardados.</p>
                    @endforelse
                </div>

                <div class="px-6 pb-6">
                    {{ $diaries->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>