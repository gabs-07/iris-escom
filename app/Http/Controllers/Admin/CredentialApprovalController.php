<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfessionalCredential;
use App\Models\User;
use App\Notifications\CredentialApproved;
use App\Notifications\CredentialRejected;
use Illuminate\Http\Request;

class CredentialApprovalController extends Controller
{
    public function index()
    {
        $credentials = ProfessionalCredential::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('admin.credentials.index', ['credentials' => $credentials]);
    }

    public function show(ProfessionalCredential $credential)
    {
        return view('admin.credentials.show', ['credential' => $credential]);
    }

    public function approve(Request $request, ProfessionalCredential $credential)
    {
        $credential->update([
            'status' => 'approved',
            'reviewed_by' => auth()->id(),
            'reviewed_at' => now(),
            'admin_notes' => $request->input('admin_notes'),
        ]);

        // Marcar como verificado
        $credential->user->update(['is_verified_professional' => true]);

        // Enviar notificación por correo electrónico
        $credential->user->notify(new CredentialApproved($credential));

        return redirect()->route('admin.credentials.index')
            ->with('success', 'Credencial aprobada correctamente. Notificación enviada al usuario.');
    }

    public function reject(Request $request, ProfessionalCredential $credential)
    {
        $validated = $request->validate([
            'admin_notes' => 'required|string|min:10|max:1000',
        ], [
            'admin_notes.required' => 'Debes proporcionar una razón del rechazo.',
            'admin_notes.min' => 'La razón debe tener al menos 10 caracteres.',
        ]);

        $credential->update([
            'status' => 'rejected',
            'reviewed_by' => auth()->id(),
            'reviewed_at' => now(),
            'admin_notes' => $validated['admin_notes'],
        ]);

        // Enviar notificación por correo electrónico
        $credential->user->notify(new CredentialRejected($credential));

        return redirect()->route('admin.credentials.index')
            ->with('success', 'Credencial rechazada correctamente. Notificación enviada al usuario.');
    }

    public function resubmit(Request $request, ProfessionalCredential $credential)
    {
        // Solo el usuario propietario puede reenviá
        if ($credential->user_id !== auth()->id()) {
            abort(403);
        }

        if (!$credential->isRejected()) {
            return redirect()->route('dashboard');
        }

        $validated = $request->validate([
            'professional_id' => 'required|string|max:255',
            'specialty_id' => 'nullable|string|max:255',
            'university' => 'required|string|max:255',
            'postgraduate' => 'nullable|string|max:255',
            'years_of_experience' => 'required|integer|min:0|max:70',
            'professional_associations' => 'required|string|min:10',
            'credential_file' => 'nullable|file|mimetypes:image/jpeg,image/png,application/pdf|max:5120',
        ]);

        // Actualizar datos
        $credential->update([
            'professional_id' => $validated['professional_id'],
            'specialty_id' => $validated['specialty_id'],
            'university' => $validated['university'],
            'postgraduate' => $validated['postgraduate'],
            'years_of_experience' => $validated['years_of_experience'],
            'professional_associations' => $validated['professional_associations'],
            'status' => 'pending',
            'reviewed_by' => null,
            'reviewed_at' => null,
            'admin_notes' => null,
        ]);

        // Si hay nuevo archivo, guardar
        if ($request->hasFile('credential_file')) {
            $filePath = $request->file('credential_file')->store('credentials', 'public');
            $credential->update(['credential_file_path' => $filePath]);
        }

        return redirect()->route('credentials.pending')
            ->with('success', 'Credenciales reenviadas para revisión.');
    }
}
