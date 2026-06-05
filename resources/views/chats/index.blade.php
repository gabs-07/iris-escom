<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-wrap items-center justify-between gap-4">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    Mis chats
                </h2>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Solo puedes conversar con otros pacientes, nunca contigo mismo.</p>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('status'))
                <div class="rounded-lg border border-green-700 bg-green-900 px-4 py-3 text-sm text-white">
                    {{ session('status') }}
                </div>
            @endif

            <div class="grid gap-6 lg:grid-cols-[360px_minmax(0,1fr)]">
                <div>
                    @include('chats.left_tabs', ['availablePatients' => $availablePatients, 'chats' => $chats, 'activeChat' => $activeChat])
                </div>

                <div>
                    @include('chats._conversation', ['chat' => $activeChat])
                </div>
            </div>
        </div>
    </div>
</x-app-layout>