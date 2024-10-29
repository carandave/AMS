<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class UserList extends Component
{
    public $search = ''; // Property for storing the search input
    public $showPending = false; // To determine whether to show pending users

    public function mount($showPending = false)
    {
        $this->showPending = $showPending; // Initialize showPending state
    }

    public function render()
    {
        // Query to fetch users based on the search input and status
        $users = User::when($this->search, function($query){
            return $query->where('last_name', 'like', '%' . $this->search . '%');
        })->paginate(10); // Paginate results

        
        return view('livewire.user-list', [
            'users' => $users,
        ]);

    }
}
