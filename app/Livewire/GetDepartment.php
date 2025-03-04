<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Department;
use App\Models\SubDepartment;
use App\Models\Thesis;
use App\Models\User;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class GetDepartment extends Component
{

    use WithFileUploads;

    public $departments_id;
    public $sub_departments_id;

    public $subdepartments = [];
    public $departments;
    public $users;

    // public function mount(){
    //     $this->subdepartments = collect();
    // }

    public $user_id, $title, $year, $author, $adviser, $keywords, $abstract, $photo, $file_path;

    protected function rules(){
        return [
            'title' => 'required',
            'year' => 'required',
            'author' => 'required',
            'adviser' => 'required',
            'keywords' => 'required',
            'user_id' => 'required',
            'departments_id' => 'required',
            'sub_departments_id' => count($this->subdepartments) > 0 ? 'required' : 'nullable',
            'abstract' => 'required',
            'photo' => 'required|image|max:1024',
            'file_path' => 'required|file|mimes:pdf',
        ];
    }

    public function mount(){
        $this->user_id = Auth::user()->id;
    }

    public function updatedDepartmentsId(){
        if($this->departments_id){
            $this->subdepartments = SubDepartment::where('departments_id', $this->departments_id)->get();
        }
        else{
            $this->subdepartments = collect();
        }
        
    }

    public function render()
    {
        // dd($this->departments_id);
        $this->users = User::where('role', 'Student')
                            ->where('status', 'Approved')->get();
        $this->departments = Department::All();
        
        // $subdepartments = SubDepartment::paginate(10);
        return view('livewire.get-department');
        // $subdepartments = SubDepartment::with('department')->paginate(10);
        
        // return view('livewire.get-department', ['subdepartments' => $subdepartments, 'departments' => $departments]);

    }

    public function store_thesis(){
        $validated = $this->validate();

        $thesis = Thesis::create([
            'title' => $validated['title'],
            'year' => $validated['year'],
            'author' => $validated['author'],
            'adviser' => $validated['adviser'],
            'keywords' => $validated['keywords'],
            'user_id' => $validated['user_id'],
            'department_id' => $validated['departments_id'],
            'sub_department_id' => $validated['sub_departments_id'],
            'submission_date' => now(),
            'abstract' => $validated['abstract'],
            'status' => "Approved",
            'photo' => $validated['photo']->store('public'),
            'file_path' => $validated['file_path']->store('public'),
        ]);

        if($thesis){

            $user_status = Auth::user()->role;

            if($user_status == "Admin"){
                return redirect()->route('admin.list-thesis')->with('success_thesis', 'Thesis Submitted Successfully');
            }

            elseif($user_status == "Faculty"){
                return redirect()->route('faculty.list-thesis')->with('success_thesis', 'Thesis Submitted Successfully');
            }

            elseif($user_status == "Student"){
                return redirect()->route('student.my-list-thesis')->with('success_thesis', 'Thesis Submitted Successfully');
            }

            
        }
    }
}
