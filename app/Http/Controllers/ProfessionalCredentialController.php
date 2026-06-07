<?php

namespace App\Http\Controllers;

use App\Models\ProfessionalCredential;
use App\Models\User;
use App\Notifications\CredentialSubmitted;
use App\Notifications\NewCredentialSubmissionAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfessionalCredentialController extends Controller
{
    public function create()
    {
        // Si ya tiene credenciales registradas, mostrar la pantalla de revisión
        $credential = auth()->user()->professionalCredential;
        
        if ($credential) {
            return $this->showStatus($credential);
        }

        return view('credentials.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'professional_id' => 'required|string|max:255',
            'specialty_id' => 'nullable|string|max:255',
            'university' => 'required|string|max:255',
            'postgraduate' => 'nullable|string|max:255',
            'years_of_experience' => 'required|integer|min:0|max:70',
            'professional_associations' => 'required|string',
            'credential_file' => 'nullable|file|max:10240',
        ], [
            'professional_id.required' => 'La cédula profesional es requerida.',
            'university.required' => 'La institución de licenciatura es requerida.',
            'years_of_experience.required' => 'Los años de experiencia son requeridos.',
            'professional_associations.required' => 'Las asociaciones profesionales son requeridas.',
            'credential_file.max' => 'El archivo no debe exceder 10 MB.',
        ]);

        // Guardar archivo si existe
        $filePath = null;
        if ($request->hasFile('credential_file')) {
            $filePath = $request->file('credential_file')->store('credentials', 'public');
        }

        // Crear credential
        $credential = auth()->user()->professionalCredential()->create([
            'professional_id' => $validated['professional_id'],
            'specialty_id' => $validated['specialty_id'],
            'university' => $validated['university'],
            'postgraduate' => $validated['postgraduate'],
            'years_of_experience' => $validated['years_of_experience'],
            'professional_associations' => $validated['professional_associations'],
            'credential_file_path' => $filePath,
            'status' => 'pending',
        ]);

        // Enviar notificación al usuario
        auth()->user()->notify(new CredentialSubmitted($credential));

        // Enviar notificación a todos los administradores
        $admins = User::where('rol', 4)->get();
        foreach ($admins as $admin) {
            $admin->notify(new NewCredentialSubmissionAdmin($credential, auth()->user()));
        }

        return redirect()->route('credentials.pending');
    }

    public function pending()
    {
        $credential = auth()->user()->professionalCredential;

        if (!$credential || !$credential->isPending()) {
            return redirect()->route('dashboard');
        }

        return view('credentials.pending', ['credential' => $credential]);
    }

    public function rejected(ProfessionalCredential $credential)
    {
        // Verificar que sea el usuario propietario
        if ($credential->user_id !== auth()->id()) {
            abort(403);
        }

        if (!$credential->isRejected()) {
            return redirect()->route('dashboard');
        }

        return view('credentials.rejected', ['credential' => $credential]);
    }

    private function showStatus(ProfessionalCredential $credential)
    {
        if ($credential->isPending()) {
            return redirect()->route('credentials.pending');
        }

        if ($credential->isRejected()) {
            return redirect()->route('credentials.rejected', $credential);
        }

        return redirect()->route('dashboard');
    }
}
