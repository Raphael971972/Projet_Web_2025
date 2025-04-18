<?php

namespace App\Http\Controllers;

use App\Models\Cohort;
use App\Models\Groups;
use App\Models\Teachers;
use App\Models\User;
use App\Models\UserSchool;
use Illuminate\Http\Request;
use App\Models\Student;

class DashboardController extends Controller
{
    /**
     * Display the dashboard view based on the authenticated user's role
     */
    public function index() {
        $userRole = auth()->user()->school()->pivot->role;

        // Count the number of teachers and students
        $nbTeacher = UserSchool::where('role', 'teacher')->count();
        $nbStudent = UserSchool::where('role', 'student')->count();
        $nbCohort = Cohort::all()->count();

        // Load the appropriate dashboard view based on the user's role
        return view('pages.dashboard.dashboard-' . $userRole, compact('nbStudent', 'nbTeacher', 'nbCohort'));
    }
}
