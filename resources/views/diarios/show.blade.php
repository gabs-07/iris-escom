<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-wrap items-center justify-between gap-4">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    Diario del {{ $diario->fecha->format('d/m/Y') }}
                </h2>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Consulta tu registro guardado.</p>
            </div>

            <a href="{{ route('diarios.index') }}" class="inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-semibold text-gray-700 shadow-sm transition hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-200 dark:hover:bg-gray-700">
                Volver al listado
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if (session('status'))
                <div class="rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800 dark:border-green-900 dark:bg-green-900/30 dark:text-green-200">
                    {{ session('status') }}
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 space-y-4">
                    <div class="rounded-lg border border-gray-200 bg-gray-50 p-4 dark:border-gray-700 dark:bg-gray-900/60">
                        <p class="text-xs uppercase tracking-[0.3em] text-gray-500 dark:text-gray-400">Fecha registrada</p>
                        <p class="mt-2 text-lg font-semibold text-gray-900 dark:text-white">{{ $diario->fecha->format('d/m/Y') }}</p>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">Guardado el {{ $diario->created_at->format('d/m/Y H:i') }}</p>
                    </div>

                    <div class="rounded-lg border border-gray-200 p-4 dark:border-gray-700">
                        <p class="whitespace-pre-line text-sm leading-7 text-gray-700 dark:text-gray-200">{{ $diario->contenido }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>