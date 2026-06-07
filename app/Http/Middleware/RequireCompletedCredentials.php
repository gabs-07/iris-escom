<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RequireCompletedCredentials
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if (!$user) {
            return redirect()->route('login');
        }

        // Los pacientes (rol 1) tienen acceso al foro
        if ((int) $user->rol === 1) {
            return $next($request);
        }

        // Psicólogos (2) y psiquiatras (3) DEBEN tener credenciales aprobadas
        if (in_array((int) $user->rol, [2, 3])) {
            // Si está verificado, tiene acceso
            if ($user->is_verified_professional) {
                return $next($request);
            }

            // Si tiene credenciales pero están pendientes
            $credential = $user->professionalCredential;
            if ($credential && $credential->status === 'pending') {
                return redirect()->route('credentials.pending')->with('error', 'Tu cuenta está en revisión. Acceso al foro será disponible después de la aprobación.');
            }

            // Si tiene credenciales pero fueron rechazadas
            if ($credential && $credential->status === 'rejected') {
                return redirect()->route('credentials.rejected', $credential)->with('error', 'Tu cuenta fue rechazada. Por favor, completa nuevamente el formulario de credenciales.');
            }

            // Si no tiene credenciales registradas
            return redirect()->route('credentials.create')->with('error', 'Debes completar tu verificación profesional para acceder al foro.');
        }

        // Otros roles tienen acceso
        return $next($request);
    }
}
