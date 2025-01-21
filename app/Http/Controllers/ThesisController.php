<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\SubDepartment;

class ThesisController extends Controller
{
    //
    // public function index(){

    //     $departments = Department::All();
    //     // $subdepartments = SubDepartment::paginate(10);

    //     $subdepartments = SubDepartment::orderBy('id', 'desc')->with('department')->paginate(10);
            
    //     return view('student.thesis.create', ['subdepartments' => $subdepartments, 'departments' => $departments]);
    // }
}
