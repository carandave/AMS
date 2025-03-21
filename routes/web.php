<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ThesisController;
use App\Http\Controllers\DashboardController;
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

    // Admin List of Thesis
    Route::get('admin/my-list-thesis', function(){
        return view('admin.thesis.myindex');
    })->name('admin.my-list-thesis');

    Route::get('admin/list-thesis', function(){
        return view('admin.thesis.index');
    })->name('admin.list-thesis');

    Route::get('admin/create-thesis', function(){
        return view('admin.thesis.create');
    })->name('admin.list-thesis.create');

    Route::get('admin/edit-thesis', function(){
        return view('admin.thesis.edit');
    })->name('admin.list-thesis.edit');


    //Admin Request Thesis List

    Route::get('admin/request-thesis', function(){
        return view('admin.request-thesis.index');
    })->name('admin.request-thesis');



    // Reports Route

    Route::get('admin/reports/requested_thesis_reports', function(){
        return view('admin.reports.requested_thesis_reports.index');
    })->name('admin.reports.requested_thesis_reports');

    Route::get('admin/reports/uploaded_thesis_reports', function(){
        return view('admin.reports.uploaded_thesis_reports.index');
    })->name('admin.reports.uploaded_thesis_reports');


    // Audit Trail List
    Route::get('admin/audit_trail', function(){
        return view('admin.audit_trail.index');
    })->name('admin.audit_trail');


    // Announcement
    Route::get('admin/announcement', function(){
        return view('admin.announcement.index');
    })->name('admin.announcement');



    // Route::get('admin/users/active', function(){
    //     return view('admin.users.active');
    // })->name('admin.users.active');

    // Route::get('admin/users/student/request', function(){
    //     return view('admin.users.student.request_account');
    // })->name('admin.users.student.request');
});

Route::middleware(['auth', 'role:Faculty'])->group(function () {

    Route::get('faculty/profile', [ProfileController::class, 'editFaculty'])->name('faculty.profile.edit');
    Route::patch('faculty/profile', [ProfileController::class, 'update'])->name('faculty.profile.update');
    Route::delete('faculty/profile', [ProfileController::class, 'destroy'])->name('faculty.profile.destroy');

    Route::get('faculty/dashboard', function(){
        return view('faculty.dashboard');
    })->name('faculty.dashboard');

    // Users Menu Route
    Route::get('faculty/users/student', function(){
        return view('faculty.users.student.index');
    })->name('faculty.users.student');

    Route::get('faculty/users/admin', function(){
        return view('faculty.users.admin.index');
    })->name('faculty.users.admin');


    //Faculty Request Thesis List

    Route::get('faculty/request-thesis', function(){
        return view('faculty.request-thesis.index');
    })->name('faculty.request-thesis');


    // Admin List of Thesis
    Route::get('faculty/my-list-thesis', function(){
        return view('faculty.thesis.myindex');
    })->name('faculty.my-list-thesis');

    Route::get('faculty/list-thesis', function(){
        return view('faculty.thesis.index');
    })->name('faculty.list-thesis');

    Route::get('faculty/create-thesis', function(){
        return view('faculty.thesis.create');
    })->name('faculty.list-thesis.create');

    Route::get('faculty/edit-thesis', function(){
        return view('faculty.thesis.edit');
    })->name('faculty.list-thesis.edit');

    
    // Announcement
    Route::get('faculty/announcement', function(){
        return view('faculty.announcement.index');
    })->name('faculty.announcement');
    

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
    Route::get('student/profile', [ProfileController::class, 'editStudent'])->name('student.profile.edit');
    Route::patch('student/profile', [ProfileController::class, 'update'])->name('student.profile.update');
    Route::delete('student/profile', [ProfileController::class, 'destroy'])->name('student.profile.destroy');

    Route::get('student/dashboard', function(){
        return view('student.dashboard');
    })->name('student.dashboard');

    

    // Thesis Routes

    // Student List of Thesis
    Route::get('student/my-list-thesis', function(){
        return view('student.thesis.myindex');
    })->name('student.my-list-thesis');

    Route::get('student/list-thesis', function(){
        return view('student.thesis.index');
    })->name('student.list-thesis');

    Route::get('student/create-thesis', function(){
        return view('student.thesis.create');
    })->name('student.list-thesis.create');

    Route::get('student/edit-thesis', function(){
        return view('student.thesis.edit');
    })->name('student.list-thesis.edit');


    //Student Request Thesis List

    Route::get('student/request-thesis', function(){
        return view('student.request-thesis.index');
    })->name('student.request-thesis');

    // Announcement
    Route::get('student/announcement', function(){
        return view('student.announcement.index');
    })->name('student.announcement');
    
    

});





require __DIR__.'/auth.php';
