<?php

namespace App\Livewire;

use Livewire\Component;
use \App\Models\User;

class UserList extends Component
{

    // public $users;

    // public function mount(){
    //     $this->users = User::all();
    // }

    public $showPending = false;

    public function mount($showPending = false){
        $this->showPending = $showPending;
    }


    public function render()
    {
        // $users = $this->showPending ? User::where('status', 'pending')->paginate(10)
        //                             : User::where('status', 'approved')->paginate(10);
        // $users = User::paginate(10);

        if($this->showPending){
            $users = User::where('status', 'pending')->paginate(10);
        }
        else{
            $users = User::where('status', 'approved')->paginate(10);
        }

        return view('livewire.user-list', [
            'users' => $users,
        ]);
    }
}
