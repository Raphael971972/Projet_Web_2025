<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\User;
use App\Models\UserSchool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Mail\PasswordMail;
use Illuminate\Support\Facades\Mail;

class TeacherController extends Controller
{
    /**
     * Display all teachers and their roles
     */
    public function index()
    {
        $teachers = User::all();
        $teachers_role = UserSchool::where('role', 'teacher')->get();
        return view('pages.teachers.index', compact('teachers', 'teachers_role'));
    }

    /**
     * Store a new teacher in the database and send an email with their password
     */
    public function store(Request $request)
    {
        $user = User::create([
            'first_name' => $request->firstname,
            'last_name' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make('1234')
        ]);

        UserSchool::create([
            'user_id' => $user->id,
            'school_id' => 1,
            'role' => 'teacher',
        ]);

        $message = "Your account has been successfully created! \n Your password is: 1234";
        $subject = "Teacher account creation";

        Mail::to($request->email)->send(new PasswordMail($message, $subject));

        return redirect()->back()->with('success', 'Teacher successfully added! An email has been sent.');
    }

    /**
     * Delete a teacher by their ID
     */
    public function destroy($id)
    {
        UserSchool::where('user_id', $id)->delete();

        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'Teacher successfully deleted.');
    }

    /**
     * Display the teacher's edit form
     */
    public function edit($id)
    {
        $teacher = User::findOrFail($id);
        return view('pages.teachers.teacher-modal', compact('teacher'));
    }

    /**
     * Update the teacher's information
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'lastname' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        $teacher = User::findOrFail($id);
        $teacher->update([
            'last_name' => $request->lastname,
            'first_name' => $request->firstname,
            'email' => $request->email,
        ]);

        return redirect()->route('teacher.index')->with('success', 'User successfully updated');
    }
}
