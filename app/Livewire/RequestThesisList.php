<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\RequestThesis;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class RequestThesisList extends Component
{

    use WithPagination;

    public $request_thesis;
    public $user_id;
    public $status = "Approved";

    public function render()
    {

        $user_id = Auth::user()->id;

        $this->request_thesis = RequestThesis::where('user_id', $user_id)
                                               ->where('status', $this->status)
                                               ->with('thesis')->get();

        // dd($this->request_thesis);

        return view('livewire.request-thesis-list');
    }
}
