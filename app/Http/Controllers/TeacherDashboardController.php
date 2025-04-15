<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TeacherDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Vérifie bien que c'est un prof
        if (!$user->isTeacher()) {
            abort(403, 'Accès non autorisé');
        }

        // Récupère ses promotions (cohorts)
        $cohorts = $user->cohorts()->whereYear('start_date', now()->year)->get();

        return view('pages.dashboard.dashboard-teacher', compact('cohorts'));
    }
}
