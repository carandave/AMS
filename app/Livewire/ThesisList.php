<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Thesis;
use App\Models\Department;
use App\Models\SubDepartment;

class ThesisList extends Component
{
    public function render()
    {

        $list_thesis = Thesis::orderBy('id', 'desc')->paginate(10);

        return view('livewire.thesis-list', ['list_thesis' => $list_thesis]);
    }
}
