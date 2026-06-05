<section class="rounded-3xl border border-gray-700 bg-gray-900 shadow-sm">
    <div class="border-b border-gray-700 px-5 py-4">
        <div class="flex items-center justify-between gap-4">
            <div>
                <p class="text-xs uppercase tracking-[0.3em] text-emerald-300">Conversaciones</p>
                <h3 class="mt-2 text-lg font-semibold text-white">Chats recientes</h3>
            </div>
            <div class="lg:hidden">
                <button @click="showList = !showList" class="inline-flex items-center gap-2 rounded-md border border-gray-600 bg-gray-800 px-3 py-1 text-sm font-medium text-white shadow-sm hover:bg-gray-700">
                    <span x-text="showList ? 'Ocultar' : 'Listar'"></span>
                </button>
            </div>
            <span class="rounded-full bg-gray-700 px-3 py-1 text-xs font-medium text-white">{{ $chats->count() }}</span>
        </div>
    </div>

    @include('chats._list', ['chats' => $chats, 'activeChat' => $activeChat])
</section>
