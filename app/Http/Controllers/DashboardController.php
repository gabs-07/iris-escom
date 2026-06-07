<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function paciente(): View
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $todayDiary = $user->diarios()
            ->whereDate('fecha', Carbon::today()->toDateString())
            ->first();

        return view('dashboards.paciente', [
            'todayDiary' => $todayDiary,
        ]);
    }
}
