<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class UserList extends Component
{

    use WithPagination, WithoutUrlPagination, WithFileUploads;

    public $search = ''; // Property for storing the search input
    public $status = 'Approved';
    public $showStudentList = false; // To determine whether to show pending users


    public $first_name, $last_name, $middle_name, $student_id, $type, $email, $photo; 

    protected function rules(){
        if($this->student_id){
            return ['first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'student_id' => 'required|unique:users,student_id',
            'email' => 'required|unique:users,email', 
            'photo' => 'required|image|max:1024'];
        }
        else{
            return ['first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'student_id' => 'nullable',
            'type' => 'required',
            'email' => 'required|unique:users,email', 
            'photo' => 'required|image|max:1024'];
        }
        
    }

    public function store_student()
    {
        
        $validated = $this->validate();

        $validated['photo'] = $this->photo;
        
        $password = Str::password(12);

        $user = User::create([
            'first_name' => $validated['first_name'],
            'middle_name' => $validated['middle_name'],
            'last_name' =>  $validated['last_name'],
            'student_id' =>  $validated['student_id'],
            'role' =>  'Student',
            'status' => 'Approved',
            'email' =>  $validated['email'],
            'password' => Hash::make($password),
            'photo' => $validated['photo']->store('public'),
        ]);

        if($user){
            return redirect()->route('admin.users.student')->with('success_student', 'Student Created Successfully');
        }

    }


    public function store_official()
    {
        
        $validated = $this->validate();

        $validated['photo'] = $this->photo;
        
        $password = Str::password(12);

        $user = User::create([
            'first_name' => $validated['first_name'],
            'middle_name' => $validated['middle_name'],
            'last_name' =>  $validated['last_name'],
            'student_id' => null,
            'role' =>  'Admin',
            'status' => 'Approved',
            'email' =>  $validated['email'],
            'password' => Hash::make($password),
            'photo' => $validated['photo']->store('public'),
        ]);

        if($user){
            return redirect()->route('admin.users.admin')->with('success_official', 'Official Created Successfully');
        }

    }

    public function mount($showStudentList = false)
    {
        $this->showStudentList = $showStudentList; // Initialize showPending state
    }

    public function render()
    {

        // if showStudentList is true it will go to this code 
        if($this->showStudentList){
            $users = User::orderBy('created_at', 'desc')->when($this->search, function($query){
                return $query->where(function($query){
                    $query->where('first_name', 'like', '%' . $this->search . '%')
                    ->orWhere('middle_name', 'like', '%' . $this->search . '%')
                    ->orWhere('last_name', 'like', '%' . $this->search . '%')
                    ->orWhere('student_id', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%');
                });
            })->where('status', $this->status)
              ->where('role', 'Student')->paginate(10); 
    
            $this->resetPage();
    
            return view('livewire.user-list', [
                'users' => $users,
            ]);
        }

        // if showStudentList is false it will go to this code 
        else if(!$this->showStudentList){
            $users = User::orderBy('created_at', 'desc')->when($this->search, function($query){
                return $query->where(function($query){
                    $query->where('first_name', 'like', '%' . $this->search . '%')
                    ->orWhere('middle_name', 'like', '%' . $this->search . '%')
                    ->orWhere('last_name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%');
                });
            })->where('status', $this->status)
              ->where('role', 'Admin')->paginate(10); 
    
            $this->resetPage();
    
            return view('livewire.user-list', [
                'users' => $users,
            ]);
        }
        

    }
}
