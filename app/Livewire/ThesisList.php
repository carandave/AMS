<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Thesis;
use App\Models\Department;
use App\Models\SubDepartment;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class ThesisList extends Component
{

    use WithFileUploads;

    public $showOwnThesisList;
    public $departments_id, $departments_name;
    public $sub_departments_id, $sub_departments_name;
    public $subdepartments = [];

    public $thesis_id;
    public $title, $year, $author, $adviser, $keywords, $abstract, $photo, $file_path;

    public $submission_date;

    public function resetFields(){
        $this->title = "";
        $this->year = "";
        $this->author = "";
        $this->adviser = "";
        $this->departments_id = "";
        $this->departments_name = "";
        $this->sub_departments_id = "";
        $this->sub_departments_name = "";
        // $this->sub_departments_name = $thesis->sub_department->name;
        $this->subdepartments = [];
        $this->submission_date = "";
        $this->keywords = "";
        $this->abstract = "";
        $this->photo = "";
        $this->file_path = "";
    }

    public function mount($showOwnThesisList = true){
        $this->showOwnThesisList = $showOwnThesisList;
    }

    public function render()
    {
        $departments = Department::paginate(10);

        if($this->showOwnThesisList){

            $user_id = Auth::user()->id;

            $list_thesis = Thesis::where('user_id', $user_id)->paginate(10);

            return view('livewire.thesis-list', ['list_thesis' => $list_thesis, 'departments' => $departments, 'subdepartments' => $this->subdepartments]);
        }
        else{
            $list_thesis = Thesis::orderBy('id', 'desc')->paginate(10);

            return view('livewire.thesis-list', ['list_thesis' => $list_thesis, 'departments' => $departments, 'subdepartments' => $this->subdepartments]);
        }

        
    }

    public function editThesis($thesis_id){

        $thesis = Thesis::with(['department', 'sub_department'])->findOrFail($thesis_id);

        $this->title = $thesis->title;
        $this->year = $thesis->year;
        $this->author = $thesis->author;
        $this->adviser = $thesis->adviser;
        $this->departments_id = $thesis->department_id;
        $this->departments_name = $thesis->department->name;
        $this->sub_departments_id = $thesis->sub_department_id;
        $this->sub_departments_name = $thesis->sub_department->name;
        // $this->sub_departments_name = $thesis->sub_department->name;
        $this->subdepartments = SubDepartment::where('departments_id', $this->departments_id)->get();
        $this->submission_date = $thesis->submission_date;
        $this->keywords = $thesis->keywords;
        $this->abstract = $thesis->abstract;
        $this->photo = $thesis->photo;
        $this->file_path = $thesis->file_path;

        // $thesis = Thesis::findOrFail($id);
        // // return view('livewire.edit-thesis', ['thesis' => $thesis]);

        // return redirect()->route('student.list-thesis.edit', ['id' => $thesis->id]);
    }

    public function updatedDepartmentsId(){
        
        if($this->departments_id){
            $this->subdepartments = SubDepartment::where('departments_id', $this->departments_id)->get();
        }
        else{
            $this->subdepartments = collect();
        }

        
        
    }
}
