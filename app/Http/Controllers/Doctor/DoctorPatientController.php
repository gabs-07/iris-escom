<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\DoctorPatient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class DoctorPatientController extends Controller
{
    public function accept(DoctorPatient $doctorPatient)
    {
        // Validar que la solicitud sea para el doctor autenticado
        if ($doctorPatient->doctor_id !== Auth::id()) {
            abort(403);
        }

        $doctorPatient->update([
            'status' => 'accepted',
            'responded_at' => now(),
        ]);

        return Redirect::back()->with('success', 'Solicitud aceptada correctamente.');
    }

    public function reject(DoctorPatient $doctorPatient)
    {
        // Validar que la solicitud sea para el doctor autenticado
        if ($doctorPatient->doctor_id !== Auth::id()) {
            abort(403);
        }

        $doctorPatient->update([
            'status' => 'rejected',
            'responded_at' => now(),
        ]);

        return Redirect::back()->with('success', 'Solicitud rechazada.');
    }
}
