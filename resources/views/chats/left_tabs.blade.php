<div x-data="{ activeTab: 'chats' }" class="space-y-4">
    <div class="flex items-center gap-2">
        <button @click="activeTab = 'requests'" :class="activeTab === 'requests' ? 'bg-emerald-600 text-white' : 'bg-gray-800 text-white/80'" class="px-3 py-2 rounded-md text-sm font-medium border border-gray-700">
            Enviar solicitud
        </button>
        <button @click="activeTab = 'chats'" :class="activeTab === 'chats' ? 'bg-emerald-600 text-white' : 'bg-gray-800 text-white/80'" class="px-3 py-2 rounded-md text-sm font-medium border border-gray-700">
            Chats
        </button>
    </div>

    <div x-show="activeTab === 'requests'" x-transition class="mt-2">
        @include('chats.requests', ['availablePatients' => $availablePatients])
    </div>

    <div x-show="activeTab === 'chats'" x-transition class="mt-2">
        @include('chats.chats_panel', ['chats' => $chats, 'activeChat' => $activeChat])
    </div>
</div>
