<div class="rounded-3xl border border-gray-700 bg-gray-900 shadow-sm">
    <div class="border-b border-gray-700 p-5">
        <p class="text-xs uppercase tracking-[0.3em] text-emerald-300">Nuevo chat</p>
        <h3 class="mt-2 text-lg font-semibold text-white">Iniciar conversación</h3>
        <p class="mt-1 text-sm text-white/80">El destinatario debe ser otro paciente.</p>
    </div>

    <div class="p-5">
        <form method="POST" action="{{ route('chats.store') }}" class="space-y-4">
            @csrf

            <div>
                <label for="recipient_id" class="block text-sm font-medium text-white">Paciente</label>
                <select id="recipient_id" name="recipient_id" required class="mt-2 block w-full rounded-2xl border-gray-600 bg-gray-800 px-4 py-3 text-white shadow-sm focus:border-emerald-500 focus:ring-emerald-500">
                    <option value="">Selecciona un paciente</option>
                    @foreach ($availablePatients as $patient)
                        <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                    @endforeach
                </select>
                @error('recipient_id')
                    <p class="mt-2 text-sm text-red-300">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="request_body" class="block text-sm font-medium text-white">Mensaje</label>
                <textarea id="request_body" name="request_body" rows="4" required maxlength="5000" placeholder="Escribe tu mensaje..." class="mt-2 block w-full rounded-2xl border-gray-600 bg-gray-800 px-4 py-3 text-white placeholder:text-white/60 shadow-sm focus:border-emerald-500 focus:ring-emerald-500"></textarea>
                @error('request_body')
                    <p class="mt-2 text-sm text-red-300">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="inline-flex items-center justify-center rounded-2xl bg-emerald-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-emerald-500">
                Enviar solicitud
            </button>
        </form>
    </div>
</div>
