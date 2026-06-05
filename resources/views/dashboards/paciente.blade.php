<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-wrap items-center justify-between gap-4">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Dashboard de Paciente
            </h2>

            <div class="flex flex-wrap gap-3">
                <a href="{{ route('diarios.index') }}" class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                    Mis diarios
                </a>
                <a href="{{ route('chats.index') }}" class="inline-flex items-center rounded-md bg-emerald-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                    Mis chats
                </a>
                <a href="{{ route('foro.index') }}" class="inline-flex items-center rounded-md bg-fuchsia-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-fuchsia-500 focus:outline-none focus:ring-2 focus:ring-fuchsia-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                    Foro
                </a>
            </div>
        </div>
    </x-slot>

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex flex-col items-start gap-4 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <p class="text-sm uppercase tracking-[0.3em] text-indigo-600 dark:text-indigo-400">Tu espacio diario</p>
                        <h3 class="mt-2 text-2xl font-semibold text-gray-900 dark:text-white">Accede a tus diarios desde aquí</h3>
                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">En esta pantalla solo tienes el acceso directo al módulo de diarios.</p>
                    </div>

                </div>
            </div>
        </div>
    </div> --}}
</x-app-layout>