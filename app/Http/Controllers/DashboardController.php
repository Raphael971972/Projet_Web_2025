<?php

namespace App\Http\Controllers;

use App\Models\Groups;
use App\Models\Teachers;
use Illuminate\Http\Request;
use App\Models\Student;

class DashboardController extends Controller
{
    public function index() {
        $userRole = auth()->user()->school()->pivot->role;
        $nbStudent = Student::count();
        $nbTeacher = Teachers::count();
        $nbGroups = Groups::count();

        return view('pages.dashboard.dashboard-' . $userRole, compact('nbStudent', 'nbTeacher', 'nbGroups'));
    }

}
