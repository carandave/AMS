<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Department;
use App\Models\SubDepartment;
use Illuminate\Auth\Events\Validated;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use App\Models\AuditTrail;
use Illuminate\Support\Facades\Auth;

use function Livewire\store;

class DepartmentList extends Component
{

    use WithPagination, WithoutUrlPagination;

    public $search = '';

    public $name;
    public $departments_id;
    public $departments_name;
    public $showCourseList = true;
    public $id;
    
    

    public function resetFields()
    {
        $this->name = '';
        $this->departments_id = '';
    }

    public function mount($showCourseList){
        $this->showCourseList = $showCourseList;
    }

    protected function rules(){
        if(!$this->departments_id){
            return ['name' => 'required|unique:departments,name'];
        }
        else{
            return [
                'departments_id' => 'required',
                'name' => 'required|unique:departments,name'
            ];
        }
        
    }


    public function render()
    {
        if($this->showCourseList){
            $departments = Department::orderBy('id', 'desc')
                ->when($this->search, function($query){
                    $this->resetPage();
                    return $query->where('name', 'like', '%' .$this->search. '%');
                })
                ->paginate(10);
            
            return view('livewire.department-list', ['departments' => $departments]);
        }

        else{
            $departments = Department::All();
            // $subdepartments = SubDepartment::paginate(10);

            $subdepartments = SubDepartment::orderBy('id', 'desc')->with('department')
            ->when($this->search, function($query){
                $this->resetPage();

                return $query->where('name', 'like', '%' . $this->search. '%');
            })
            ->paginate(10);
            
            return view('livewire.department-list', ['subdepartments' => $subdepartments, 'departments' => $departments]);
        }
        


    }

    public function store_course(){
        $validated = $this->validate();

        $departments = Department::create([
            'name' => $validated['name']]
        );

        AuditTrail::create([
            'user_id' => Auth::id(),
            'action' => "Create New Course",
            'table_name' => "Departments",
            'record_id' => $departments->id,
        ]);

        if($departments){
            return redirect()->route('admin.department.course')->with('success_course', 'Course Created Successfully');
        }
    }

    public function store_major(){
        
        $validated = $this->validate();

        $sub_departments = SubDepartment::create([
            'departments_id' => $validated['departments_id'], 
            'name' => $validated['name']
            ]);

        AuditTrail::create([
            'user_id' => Auth::id(),
            'action' => "Create New Major",
            'table_name' => "Sub Departments",
            'record_id' => $sub_departments->id,
        ]);

        if($sub_departments){
            return redirect()->route('admin.department.major')->with('success_major', 'Major Created Successfully');
        }
    }

    public function editCourse(Department $deparment){
        $this->id = $deparment->id;
        $this->name = $deparment->name;
        
    }

    public function editMajor(SubDepartment $subdeparment){
        $this->departments_id = $subdeparment->departments_id;
        $this->departments_name = $subdeparment->department->name;
        $this->id = $subdeparment->id;
        $this->name = $subdeparment->name;
        
    }


    public function update_course(){

        $validated = $this->validate([
            'name' => 'required|unique:departments,name,' .$this->id.'name'
        ]);

        $department = Department::findOrFail($this->id);

        $department->update([
            'name' => $validated['name']
        ]);

        AuditTrail::create([
            'user_id' => Auth::id(),
            'action' => "Update Course",
            'table_name' => "Departments",
            'record_id' => $department->id,
        ]);

        if($department){
            return redirect()->route('admin.department.course')->with('success_edit_course', 'Course Updated Successfully');
        }
    }

    public function update_major(){

        // dd($this->id, $this->departments_id, $this->name);

        $validated = $this->validate([
            'departments_id' => 'required',
            'name' => 'required|unique:sub_departments,name,'.$this->id.'name'
        ]);

        $sub_department = SubDepartment::findOrFail($this->id);

        $sub_department->update([
            'departments_id' => $validated['departments_id'],
            'name' => $validated['name']
        ]);

        AuditTrail::create([
            'user_id' => Auth::id(),
            'action' => "Update Major",
            'table_name' => "Sub Departments",
            'record_id' => $sub_department->id,
        ]);

        if($sub_department){
            return redirect()->route('admin.department.major')->with('success_edit_major', 'Major Updated Successfully');
        }
        

        
    }

    public function archiveCourse($courseId){
        $course = Department::findOrFail($courseId);

        AuditTrail::create([
            'user_id' => Auth::id(),
            'action' => "Delete Course",
            'table_name' => "Departments",
            'record_id' => $course->id,
        ]);

        if($course->delete()){
            return redirect()->route('admin.department.course')->with('success_archive_course', 'Course Successfully Deleted');
        }
    }

    public function archiveMajor($majorId){
        $major = SubDepartment::findOrFail($majorId);

        AuditTrail::create([
            'user_id' => Auth::id(),
            'action' => "Delete Major",
            'table_name' => "Sub Departments",
            'record_id' => $major->id,
        ]);

        if($major->delete()){
            return redirect()->route('admin.department.major')->with('success_archive_major', 'Major Successfully Deleted');
        }
    }
}
