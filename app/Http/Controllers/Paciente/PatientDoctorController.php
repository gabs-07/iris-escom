<?php

namespace App\Http\Controllers\Paciente;

use App\Http\Controllers\Controller;
use App\Models\DoctorPatient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PatientDoctorController extends Controller
{
    public function index()
    {
        // Obtener todos los doctores verificados (psicólogos y psiquiatras)
        $doctors = User::whereIn('rol', [2, 3])
            ->where('is_verified_professional', true)
            ->get();

        // Obtener los doctores ya conectados con este paciente
        $connectedDoctorIds = Auth::user()->doctors()->pluck('doctor_id')->toArray();

        // Obtener las solicitudes pendientes del paciente
        $pendingRequests = Auth::user()->pendingDoctorRequests()->pluck('doctor_id')->toArray();

        return view('doctores.directorio', compact('doctors', 'connectedDoctorIds', 'pendingRequests'));
    }

    public function store(User $doctor)
    {
        // Validar que sea un doctor
        if (!in_array($doctor->rol, [2, 3]) || !$doctor->is_verified_professional) {
            abort(404);
        }

        // Validar que el usuario autenticado sea un paciente
        if (Auth::user()->rol !== 1) {
            abort(403);
        }

        // Verificar si ya existe una relación (pendiente, aceptada o rechazada)
        $existing = DoctorPatient::where('patient_id', Auth::id())
            ->where('doctor_id', $doctor->id)
            ->first();

        if ($existing) {
            if ($existing->status === 'rejected') {
                // Permitir reenviar si fue rechazada
                $existing->update([
                    'status' => 'pending',
                    'requested_at' => now(),
                    'responded_at' => null,
                ]);
                return Redirect::back()->with('success', 'Solicitud reenviada al doctor.');
            } else {
                return Redirect::back()->with('error', 'Ya tienes una solicitud pendiente o aceptada con este doctor.');
            }
        }

        // Crear nueva solicitud
        DoctorPatient::create([
            'patient_id' => Auth::id(),
            'doctor_id' => $doctor->id,
            'status' => 'pending',
        ]);

        return Redirect::back()->with('success', 'Solicitud enviada al doctor ' . $doctor->name . '.');
    }

    public function myDoctors()
    {
        $doctors = Auth::user()->doctors()->with('doctor')->get();
        return view('doctores.mis-doctores', compact('doctors'));
    }

    public function cancelRequest(DoctorPatient $doctorPatient)
    {
        // Validar que la solicitud sea del paciente autenticado
        if ($doctorPatient->patient_id !== Auth::id() || $doctorPatient->status !== 'pending') {
            abort(403);
        }

        $doctorPatient->delete();

        return Redirect::back()->with('success', 'Solicitud cancelada.');
    }
}

