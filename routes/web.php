<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ThesisController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Route::get('/dashboard', function () {
//     return view('welcome');
// })->name('dashboard');

// Route::get('/admin/dashboard', function () {
//     return view('admin.dashboard');
// })->middleware(['auth', 'verified'])->name('admin.dashboard');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('admin/profile', [ProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::patch('admin/profile', [ProfileController::class, 'update'])->name('admin.profile.update');
    Route::delete('admin/profile', [ProfileController::class, 'destroy'])->name('admin.profile.destroy');

    Route::get('admin/dashboard', function(){
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Users Menu Route
    Route::get('admin/users/student', function(){
        return view('admin.users.student.index');
    })->name('admin.users.student');

    Route::get('admin/users/admin', function(){
        return view('admin.users.admin.index');
    })->name('admin.users.admin');


    // Department Menu Route
    Route::get('admin/department/course', function(){
        return view('admin.department.course.index');
    })->name('admin.department.course');

    Route::get('admin/department/major', function(){
        return view('admin.department.major.index');
    })->name('admin.department.major');

    // Route::get('admin/users/active', function(){
    //     return view('admin.users.active');
    // })->name('admin.users.active');

    // Route::get('admin/users/student/request', function(){
    //     return view('admin.users.student.request_account');
    // })->name('admin.users.student.request');
});

Route::middleware(['auth', 'role:Faculty'])->group(function () {

    Route::get('faculty/profile', [ProfileController::class, 'edit'])->name('faculty.profile.edit');
    Route::patch('faculty/profile', [ProfileController::class, 'update'])->name('faculty.profile.update');
    Route::delete('faculty/profile', [ProfileController::class, 'destroy'])->name('faculty.profile.destroy');

    Route::get('faculty/dashboard', function(){
        return view('faculty.dashboard');
    })->name('faculty.dashboard');

    // Route::get('faculty/profile', [ProfileController::class, 'edit'])->name('faculty.profile.edit');
    // Route::patch('faculty/profile', [ProfileController::class, 'update'])->name('faculty.profile.update');
    // Route::delete('faculty/profile', [ProfileController::class, 'destroy'])->name('faculty.profile.destroy');

    // Route::get('faculty/dashboard', function(){
    //     return view('faculty.dashboard');
    // })->name('faculty.dashboard');
    
    // Route::get('faculty/users/student', function(){
    //     return view('faculty.users.student.index');
    // })->name('faculty.users.student');

    // Route::get('faculty/users/admin', function(){
    //     return view('faculty.users.admin.index');
    // })->name('faculty.users.admin');

});

Route::middleware(['auth', 'role:Student'])->group(function () {
    Route::get('student/profile', [ProfileController::class, 'edit'])->name('student.profile.edit');
    Route::patch('student/profile', [ProfileController::class, 'update'])->name('student.profile.update');
    Route::delete('student/profile', [ProfileController::class, 'destroy'])->name('student.profile.destroy');

    Route::get('student/dashboard', function(){
        return view('student.dashboard');
    })->name('student.dashboard');

    Route::get('student/list-thesis', function(){
        return view('student.thesis.index');
    })->name('student.list-thesis');

    // Thesis Routes
    Route::get('student/create-thesis', function(){
        return view('student.thesis.create');
    })->name('student.list-thesis.create');

});





require __DIR__.'/auth.php';
