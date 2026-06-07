<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-wrap items-center justify-between gap-4 text-white">
            <h2 class="font-semibold text-xl leading-tight">
                Panel de Administrador
            </h2>

            <div class="flex flex-wrap gap-3">
                <a href="{{ route('admin.users') }}" class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-500">
                    Gestionar Usuarios
                </a>
                <a href="{{ route('admin.credentials.index') }}" class="inline-flex items-center rounded-md bg-green-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-green-500">
                    Credenciales Profesionales
                </a>
                <a href="{{ route('foro.index') }}" class="inline-flex items-center rounded-md bg-fuchsia-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-fuchsia-500">
                    Foro
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12 text-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <!-- Bienvenida -->
            <div class="mb-8 rounded-lg bg-gradient-to-r from-indigo-600 to-purple-600 p-6 shadow-lg">
                <h3 class="text-2xl font-bold">Bienvenido, {{ Auth::user()->name }}!</h3>
                <p class="mt-2 text-indigo-100">Gestiona la plataforma desde este panel administrativo.</p>
            </div>

            <!-- Estadísticas -->
            <div class="mb-8 grid gap-6 md:grid-cols-2 lg:grid-cols-4">

                <!-- Usuarios -->
                <div class="rounded-lg bg-gray-800 p-6 shadow-sm">
                    <p class="text-sm font-medium text-white">Total de Usuarios</p>
                    <p class="mt-2 text-3xl font-bold text-white">{{ $totalUsers }}</p>
                </div>

                <!-- Pacientes -->
                <div class="rounded-lg bg-gray-800 p-6 shadow-sm">
                    <p class="text-sm font-medium text-white">Pacientes</p>
                    <p class="mt-2 text-3xl font-bold text-white">{{ $pacientes }}</p>
                </div>

                <!-- Psicólogos -->
                <div class="rounded-lg bg-gray-800 p-6 shadow-sm">
                    <p class="text-sm font-medium text-white">Psicólogos</p>
                    <p class="mt-2 text-3xl font-bold text-white">{{ $psicologos }}</p>
                </div>

                <!-- Psiquiatras -->
                <div class="rounded-lg bg-gray-800 p-6 shadow-sm">
                    <p class="text-sm font-medium text-white">Psiquiatras</p>
                    <p class="mt-2 text-3xl font-bold text-white">{{ $psiquiatras }}</p>
                </div>
            </div>

           
            </div>

        </div>
    </div>
</x-app-layout>