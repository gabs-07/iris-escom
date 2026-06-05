<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-wrap items-center justify-between gap-4">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    Foro de la comunidad
                </h2>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Publica, comenta y conversa con otros usuarios.</p>
            </div>

            <a href="{{ route('dashboard') }}" class="inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-semibold text-gray-700 shadow-sm transition hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-200 dark:hover:bg-gray-700">
                Volver al dashboard
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8 space-y-6">
            @if (session('status'))
                <div class="rounded-lg border border-emerald-700 bg-emerald-900 px-4 py-3 text-sm text-white">
                    {{ session('status') }}
                </div>
            @endif

            <section class="rounded-3xl border border-gray-700 bg-gray-900 p-5 shadow-sm">
                <div class="flex items-center gap-3">
                    <div class="flex h-11 w-11 items-center justify-center rounded-full bg-emerald-600 text-sm font-semibold text-white">
                        {{ strtoupper(mb_substr(auth()->user()->name, 0, 1)) }}
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-white">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-white/70">Escribe una nueva publicación</p>
                    </div>
                </div>

                <form method="POST" action="{{ route('foro.publicaciones.store') }}" class="mt-4 space-y-3">
                    @csrf
                    <textarea name="contenido" rows="4" maxlength="5000" required placeholder="¿Qué estás pensando?" class="w-full rounded-2xl border border-gray-600 bg-gray-800 px-4 py-3 text-white placeholder:text-white/60 focus:border-emerald-500 focus:ring-emerald-500">{{ old('contenido') }}</textarea>
                    @error('contenido')
                        <p class="text-sm text-red-300">{{ $message }}</p>
                    @enderror
                    <div class="flex justify-end">
                        <button type="submit" class="rounded-full bg-emerald-600 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-emerald-500">
                            Publicar
                        </button>
                    </div>
                </form>
            </section>

            <div class="space-y-5">
                @forelse ($publicaciones as $publicacion)
                    <article class="overflow-hidden rounded-3xl border border-gray-700 bg-gray-900 shadow-sm">
                        <div class="border-b border-gray-700 p-5">
                            <div class="flex items-start gap-3">
                                <div class="flex h-11 w-11 items-center justify-center rounded-full bg-indigo-600 text-sm font-semibold text-white">
                                    {{ strtoupper(mb_substr($publicacion->user->name, 0, 1)) }}
                                </div>
                                <div class="min-w-0 flex-1">
                                    <div class="flex flex-wrap items-center justify-between gap-3">
                                        <div>
                                            <h3 class="text-base font-semibold text-white">{{ $publicacion->user->name }}</h3>
                                            <p class="text-xs text-white/60">{{ $publicacion->created_at->format('d/m/Y H:i') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <p class="mt-4 whitespace-pre-line text-sm leading-6 text-white">{{ $publicacion->contenido }}</p>
                        </div>

                        <div class="bg-gray-950 p-5">
                            <h4 class="text-sm font-semibold text-white">Comentarios</h4>

                            <div class="mt-4 space-y-4">
                                @forelse ($publicacion->comentarios as $comentario)
                                    <div class="rounded-2xl border border-gray-700 bg-gray-900 p-4">
                                        <div class="flex items-start gap-3">
                                            <div class="flex h-9 w-9 items-center justify-center rounded-full bg-gray-700 text-xs font-semibold text-white">
                                                {{ strtoupper(mb_substr($comentario->user->name, 0, 1)) }}
                                            </div>
                                            <div class="min-w-0 flex-1">
                                                <div class="flex flex-wrap items-center justify-between gap-2">
                                                    <div>
                                                        <p class="text-sm font-semibold text-white">{{ $comentario->user->name }}</p>
                                                        <p class="text-xs text-white/60">{{ $comentario->created_at->format('d/m/Y H:i') }}</p>
                                                    </div>

                                                    @if ($comentario->user_id === auth()->id())
                                                        <div class="flex flex-wrap gap-2">
                                                            <a href="{{ route('foro.comentarios.edit', $comentario) }}" class="rounded-full border border-gray-600 px-3 py-1 text-xs font-semibold text-white transition hover:bg-gray-700">
                                                                Editar
                                                            </a>

                                                            <form method="POST" action="{{ route('foro.comentarios.destroy', $comentario) }}" onsubmit="return confirm('¿Eliminar este comentario?');">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="rounded-full border border-red-500 px-3 py-1 text-xs font-semibold text-white transition hover:bg-red-600">
                                                                    Eliminar
                                                                </button>
                                                            </form>
                                                        </div>
                                                    @endif
                                                </div>

                                                <p class="mt-3 whitespace-pre-line text-sm leading-6 text-white/90">{{ $comentario->contenido }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <p class="text-sm text-white/60">Aún no hay comentarios.</p>
                                @endforelse
                            </div>

                            <form method="POST" action="{{ route('foro.publicaciones.comentarios.store', $publicacion) }}" class="mt-5 space-y-3">
                                @csrf
                                <textarea name="contenido" rows="3" maxlength="2000" required placeholder="Escribe un comentario..." class="w-full rounded-2xl border border-gray-600 bg-gray-800 px-4 py-3 text-white placeholder:text-white/60 focus:border-emerald-500 focus:ring-emerald-500">{{ old('contenido') }}</textarea>
                                @error('contenido')
                                    <p class="text-sm text-red-300">{{ $message }}</p>
                                @enderror
                                <div class="flex justify-end">
                                    <button type="submit" class="rounded-full bg-emerald-600 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-emerald-500">
                                        Comentar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </article>
                @empty
                    <div class="rounded-3xl border border-gray-700 bg-gray-900 p-8 text-center text-white/70">
                        No hay publicaciones todavía.
                    </div>
                @endforelse
            </div>

            <div>
                {{ $publicaciones->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
