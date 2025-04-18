<?php

use App\Http\Controllers\CohortController;
use App\Http\Controllers\CommonLifeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RetroController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\KnowledgeController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;




// Redirect the root path to /dashboard
Route::redirect('/', 'dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');




    Route::middleware('verified')->group(function () {
        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Cohorts
        Route::get('/cohorts', [CohortController::class, 'index'])->name('cohort.index');
        Route::post('/cohorts', [CohortController::class, 'store'])->name('cohorts.store');
        Route::delete('/cohorts/{id}', [CohortController::class, 'destroy'])->name('cohorts.destroy');
        Route::get('/cohorts/{id}/edit', [CohortController::class, 'edit'])->name('cohorts.edit');
        Route::put('/cohorts/{id}', [CohortController::class, 'update'])->name('cohorts.update');
        Route::get('/teacher/promotions', [TeacherController::class, 'myPromotions'])->name('teacher.promotions');





        // Teachers
        Route::get('/teachers', [TeacherController::class, 'index'])->name('teacher.index');
        Route::post('/teachers', [TeacherController::class, 'store'])->name('teachers.store');
        Route::delete('/teachers/{id}', [TeacherController::class, 'destroy'])->name('teachers.destroy');
        Route::get('/users/{id}/edit', [TeacherController::class, 'edit'])->name('users.edit');
        Route::put('/users/{id}', [TeacherController::class, 'update'])->name('users.update');


        // Students
        Route::get('/students', [StudentController::class, 'index'])->name('student.index');
        Route::post('/students', [StudentController::class, 'store'])->name('students.store');
        Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');
        Route::get('/users/{id}/edit', [StudentController::class, 'edit'])->name('users.edit');
        Route::put('/users/{id}', [StudentController::class, 'update'])->name('users.update');







        // Knowledge
        Route::get('knowledge', [KnowledgeController::class, 'index'])->name('knowledge.index');

        // Groups
        Route::get('groups', [GroupController::class, 'index'])->name('group.index');

        //Email


        // Retro
        route::get('retros', [RetroController::class, 'index'])->name('retro.index');

        // Common life
        Route::get('common-life', [CommonLifeController::class, 'index'])->name('common-life.index');
    });

});

require __DIR__.'/auth.php';
