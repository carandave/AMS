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
    public $showPending = false; // To determine whether to show pending users

    public function search()
    {
        // $this->resetPage();
    }

    public function mount($showPending = false)
    {
        $this->showPending = $showPending; // Initialize showPending state
    }

    public function render()
    {

        $users = User::when($this->search, function($query){
            return $query->where(function($query){
                $query->where('first_name', 'like', '%' . $this->search . '%')
                ->orWhere('middle_name', 'like', '%' . $this->search . '%')
                ->orWhere('last_name', 'like', '%' . $this->search . '%')
                ->orWhere('student_id', 'like', '%' . $this->search . '%');
            });
        })->where('status', $this->status)->paginate(); 

        $this->resetPage();

        return view('livewire.user-list', [
            'users' => $users,
        ]);

    }
}
