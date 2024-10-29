<?php

namespace App\Livewire;

use Livewire\Component;

class TestsComponent extends Component
{
    public $message = "Hello, Dave";
    
    public function render()
    {
        return view('livewire.tests-component');
    }
}
