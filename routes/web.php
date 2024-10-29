<?php

use App\Http\Controllers\ProfileController;
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

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('admin/profile', [ProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::patch('admin/profile', [ProfileController::class, 'update'])->name('admin.profile.update');
    Route::delete('admin/profile', [ProfileController::class, 'destroy'])->name('admin.profile.destroy');

    Route::get('admin/dashboard', function(){
        return view('admin.dashboard');
    })->name('admin.dashboard');
    
    Route::get('admin/users/student', function(){
        return view('admin.users.student.index');
    })->name('admin.users.student');

    // Route::get('admin/users/active', function(){
    //     return view('admin.users.active');
    // })->name('admin.users.active');

    Route::get('admin/users/student/request', function(){
        return view('admin.users.student.request_account');
    })->name('admin.users.student.request');
});

Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('student/profile', [ProfileController::class, 'edit'])->name('student.profile.edit');
    Route::patch('student/profile', [ProfileController::class, 'update'])->name('student.profile.update');
    Route::delete('student/profile', [ProfileController::class, 'destroy'])->name('student.profile.destroy');

    Route::get('student/dashboard', function(){
        return view('student.dashboard');
    })->name('student.dashboard');
});





require __DIR__.'/auth.php';
