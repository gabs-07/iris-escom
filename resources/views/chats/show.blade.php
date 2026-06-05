<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-wrap items-center justify-between gap-4">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    Chat con {{ $chat->sender_id === auth()->id() ? $chat->recipient->name : $chat->sender->name }}
                </h2>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Estado: {{ ucfirst($chat->status) }}</p>
            </div>

            <a href="{{ route('chats.index') }}" class="inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-semibold text-gray-700 shadow-sm transition hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-200 dark:hover:bg-gray-700">
                Volver
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
            <div x-data="{ showList: false }" class="rounded-3xl border border-gray-700 bg-gray-900 shadow-sm">
                <div class="grid gap-6 lg:grid-cols-[360px_minmax(0,1fr)]">
                    <div class="p-4">
                        @include('chats.left_tabs', ['availablePatients' => $availablePatients, 'chats' => $chats, 'activeChat' => $chat])
                    </div>

                    <div class="p-0">
                        @include('chats._conversation', ['chat' => $chat])
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>