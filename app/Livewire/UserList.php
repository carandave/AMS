<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class UserList extends Component
{

    use WithPagination, WithoutUrlPagination;

    public $search = ''; // Property for storing the search input
    public $status = 'approved';
    public $showStudentList = false; // To determine whether to show pending users

    public function search()
    {
        // $this->resetPage();
    }

    public function mount($showStudentList = false)
    {
        $this->showStudentList = $showStudentList; // Initialize showPending state
    }

    public function render()
    {

        // if showStudentList is true it will go to this code 
        if($this->showStudentList){
            $users = User::when($this->search, function($query){
                return $query->where(function($query){
                    $query->where('first_name', 'like', '%' . $this->search . '%')
                    ->orWhere('middle_name', 'like', '%' . $this->search . '%')
                    ->orWhere('last_name', 'like', '%' . $this->search . '%')
                    ->orWhere('student_id', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%');
                });
            })->where('status', $this->status)
              ->where('role', 'student')->paginate(10); 
    
            $this->resetPage();
    
            return view('livewire.user-list', [
                'users' => $users,
            ]);
        }

        // if showStudentList is false it will go to this code 
        else if(!$this->showStudentList){
            $users = User::when($this->search, function($query){
                return $query->where(function($query){
                    $query->where('first_name', 'like', '%' . $this->search . '%')
                    ->orWhere('middle_name', 'like', '%' . $this->search . '%')
                    ->orWhere('last_name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%');
                });
            })->where('status', $this->status)
              ->where('role', 'admin')->paginate(10); 
    
            $this->resetPage();
    
            return view('livewire.user-list', [
                'users' => $users,
            ]);
        }
        

    }
}
