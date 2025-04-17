<?php

namespace App\Http\Controllers;
use App\Models\Student;

use App\Models\User;
use App\Models\UserSchool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Mail\PasswordMail;
use Illuminate\support\facades\Mail;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = User::all();
        $teachers_role = UserSchool::where('role', 'teacher')->get();
        return view('pages.teachers.index',compact('teachers','teachers_role'));
    }

    public function store(Request $request){

        $user = User::create([


            'first_name' => $request ->firstname,
            'last_name' => $request ->lastname,
            'email' => $request ->email,
            'password' => Hash::make('1234')
        ]);

        UserSchool::create([

            'user_id' => $user->id,
            'school_id' => 1,
            'role' => 'teacher',
        ]);




        $message = "Votre compte a bien été créée ! \n votre mot de passe est le suivant : 1234";
        $subject = "Création de votre compte enseignant ";

        Mail::to($request ->email)->send(new PasswordMail($message, $subject));

        return redirect()->back()->with('success', 'enseignant ajouté avec succès ! un email a été envoyé');
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
        $teacher = User::findOrFail($id);
        return view('pages.teachers.teacher-modal', compact('teacher'));
    }

    public function update(Request $request, $id)
    {
        // Validation des données
        $request->validate([
            'lastname' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id, // Vérifie que l'email est unique sauf pour cet utilisateur
        ]);

        $teacher = User::findOrFail($id);
        $teacher->update([
            'last_name' => $request->lastname,
            'first_name' => $request->firstname,
            'email' => $request->email,
        ]);

        return redirect()->route('teacher.index')->with('success', 'Utilisateur modifié avec succès');
    }




}
