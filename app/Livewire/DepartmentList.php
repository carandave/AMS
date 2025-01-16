<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Department;
use App\Models\SubDepartment;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

use function Livewire\store;

class DepartmentList extends Component
{

    use WithPagination, WithoutUrlPagination;

    public $name;
    public $departments_id;
    public $showCourseList = true;
    
    

    public function resetFields()
    {
        $this->name = '';
    }

    public function mount($showCourseList = true){
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
            $departments = Department::paginate(10);
            
            return view('livewire.department-list', ['departments' => $departments]);
        }

        else{
            $departments = Department::All();
            // $subdepartments = SubDepartment::paginate(10);

            $subdepartments = SubDepartment::with('department')->paginate(10);
            
            return view('livewire.department-list', ['subdepartments' => $subdepartments, 'departments' => $departments]);
        }
        


    }

    public function store_course(){
        $validated = $this->validate();

        $departments = Department::create([
            'name' => $validated['name']]
        );

        if($departments){
            return redirect()->route('admin.department.course')->with('success_department', 'Course Created Successfully');
        }
    }

    public function store_major(){
        
        $validated = $this->validate();

        $sub_departments = SubDepartment::create([
            'departments_id' => $validated['departments_id'], 
            'name' => $validated['name']
            ]);

        if($sub_departments){
            return redirect()->route('admin.department.major')->with('success_major', 'Major Created Successfully');
        }
    }
}
