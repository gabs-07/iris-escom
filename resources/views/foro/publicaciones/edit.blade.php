<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-wrap items-center justify-between gap-4">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    Editar publicación
                </h2>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Actualiza el contenido de tu publicación.</p>
            </div>

            <a href="{{ route('foro.index') }}" class="inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-semibold text-gray-700 shadow-sm transition hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-200 dark:hover:bg-gray-700">
                Volver al foro
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
            <section class="rounded-3xl border border-gray-700 bg-gray-900 p-5 shadow-sm">
                <div class="flex items-center gap-3">
                    <div class="flex h-11 w-11 items-center justify-center rounded-full bg-emerald-600 text-sm font-semibold text-white">
                        {{ strtoupper(mb_substr(auth()->user()->name, 0, 1)) }}
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-white">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-white/70">Edita tu publicación</p>
                    </div>
                </div>

                <form method="POST" action="{{ route('foro.publicaciones.update', $publicacion) }}" class="mt-4 space-y-3">
                    @csrf
                    @method('PATCH')
                    <textarea name="contenido" rows="6" maxlength="5000" required placeholder="¿Qué estás pensando?" class="w-full rounded-2xl border border-gray-600 bg-gray-800 px-4 py-3 text-white placeholder:text-white/60 focus:border-emerald-500 focus:ring-emerald-500">{{ old('contenido', $publicacion->contenido) }}</textarea>
                    @error('contenido')
                        <p class="text-sm text-red-300">{{ $message }}</p>
                    @enderror
                    <div class="flex justify-end gap-2">
                        <a href="{{ route('foro.index') }}" class="rounded-full border border-gray-600 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-gray-700">
                            Cancelar
                        </a>
                        <button type="submit" class="rounded-full bg-emerald-600 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-emerald-500">
                            Guardar cambios
                        </button>
                    </div>
                </form>
            </section>
        </div>
    </div>
</x-app-layout>
