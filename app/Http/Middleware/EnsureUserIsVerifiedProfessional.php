<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsVerifiedProfessional
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Si el usuario no está autenticado, lo redirige al login
        if (!$request->user()) {
            return redirect()->route('login');
        }

        // Si el usuario es paciente (rol 1), puede continuar
        if ((int) $request->user()->rol === 1) {
            return $next($request);
        }

        // Si es psicólogo (2) o psiquiatra (3), permitir acceso pero verificar credenciales
        // Las vistas de dashboard (psicologo.blade.php, psiquiatra.blade.php) manejarán
        // mostrar el formulario si no tiene credenciales verificadas
        if (in_array((int) $request->user()->rol, [2, 3])) {
            return $next($request);
        }

        // Otros roles (admin) pueden continuar
        return $next($request);
    }
}
