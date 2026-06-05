<div x-cloak x-show="showList || $screen('lg')" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-x-2" x-transition:enter-end="opacity-100 translate-x-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-x-0" x-transition:leave-end="opacity-0 -translate-x-2" class="border-b border-gray-700 lg:border-b-0 lg:border-r">
    <div class="flex items-center justify-between p-3 lg:hidden">
        <h4 class="text-sm font-medium text-white">Conversaciones</h4>
        <button @click="showList = false" class="inline-flex items-center gap-2 rounded-md border border-gray-600 bg-gray-800 px-3 py-1 text-sm font-medium text-white shadow-sm hover:bg-gray-700">Cerrar</button>
    </div>

    <div class="max-h-[72vh] overflow-y-auto bg-gray-900 p-3">
        @forelse ($chats as $chatItem)
            @php
                $otherUser = $chatItem->sender_id === auth()->id() ? $chatItem->recipient : $chatItem->sender;
                $isActive = isset($activeChat) && $activeChat->id === $chatItem->id;
            @endphp
            <a href="{{ route('chats.index', ['chat' => $chatItem->id]) }}" class="mb-2 block rounded-2xl border p-4 transition {{ $isActive ? 'border-emerald-500 bg-gray-800' : 'border-gray-700 bg-gray-800/70 hover:border-emerald-400 hover:bg-gray-800' }}">
                <div class="flex items-center justify-between gap-3">
                    <div>
                        <p class="font-medium text-white">{{ $otherUser->name }}</p>
                        @php
                            $status = $chatItem->status;
                        @endphp
                        @if($status === 'accepted')
                            <span class="mt-1 inline-flex items-center rounded-full bg-emerald-600 px-2 py-0.5 text-xs font-medium text-white dark:bg-emerald-500">Aceptado</span>
                        @elseif($status === 'pending')
                            <span class="mt-1 inline-flex items-center rounded-full bg-amber-500 px-2 py-0.5 text-xs font-medium text-white dark:bg-amber-400">Pendiente</span>
                        @elseif($status === 'rejected')
                            <span class="mt-1 inline-flex items-center rounded-full bg-red-600 px-2 py-0.5 text-xs font-medium text-white dark:bg-red-500">Rechazado</span>
                        @else
                            <span class="mt-1 inline-flex items-center rounded-full bg-gray-600 px-2 py-0.5 text-xs font-medium text-white">{{ ucfirst($status) }}</span>
                        @endif
                    </div>
                    <span class="text-xs text-white/60">{{ optional($chatItem->messages->last())->created_at?->format('H:i') }}</span>
                </div>
                <p class="mt-2 line-clamp-2 text-sm text-white/75">{{ optional($chatItem->messages->last())->body ?? 'Sin mensajes' }}</p>
            </a>
        @empty
            <div class="p-4 text-sm text-white/75">Aún no tienes conversaciones.</div>
        @endforelse
    </div>
</div>
