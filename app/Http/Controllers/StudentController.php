<?php

namespace App\Http\Controllers;
use App\Models\Student;

use App\Models\User;
use App\Models\UserSchool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Mail\PasswordMail;
use Illuminate\support\facades\Mail;

class StudentController extends Controller
{
    public function index()
    {
        $students = User::all();
        $students_role = UserSchool::where('role', 'student')->get();
        return view('pages.students.index',compact('students','students_role'));
    }

    public function store(Request $request){

        $user = User::create([


            'first_name' => $request ->firstname,
            'last_name' => $request ->lastname,
            'email' => $request ->email,
            'birth_date' => $request ->birth_date,
            'password' => Hash::make('1234')
        ]);

        UserSchool::create([

            'user_id' => $user->id,
            'school_id' => 1,
            'role' => 'student',
        ]);




        $message = "Votre compte a bien été créée ! \n votre mot de passe est le suivant : 1234";
        $subject = "Création de votre compte étudiant ";

        Mail::to($request ->email)->send(new PasswordMail($message, $subject));

        return redirect()->back()->with('success', 'Étudiant ajouté avec succès ! un email a été envoyé');
    }

    public function destroy($id)
    {

        UserSchool::where('user_id', $id)->delete();

        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'Étudiant supprimé avec succès.');
    }

    public function edit($id)
    {
        $student = User::findOrFail($id);
        return view('pages.students.student-modal', compact('student'));
    }

    public function update(Request $request, $id)
    {
        // Validation des données
        $request->validate([
            'lastname' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id, // Vérifie que l'email est unique sauf pour cet utilisateur
            'birth_date' => 'required|date',
        ]);

        $student = User::findOrFail($id);
        $student->update([
            'last_name' => $request->lastname,
            'first_name' => $request->firstname,
            'email' => $request->email,
            'birth_date' => $request->birth_date,
        ]);

        return redirect()->route('users.index')->with('success', 'Utilisateur modifié avec succès');
    }




}
