<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\RequestThesis;
use App\Models\Thesis;

class Dashboard extends Component
{

    public $totalThesisUploaded;
    public $totalPendingThesisRequest;
    public $totalApprovedThesisRequest;
    public $totalDeniedThesisRequest;

    public function mount(){
        $this->totalThesisUploaded = Thesis::where('status', 'Approved')->count();
        $this->totalPendingThesisRequest = RequestThesis::where('status', 'Pending')->count();
        $this->totalApprovedThesisRequest = RequestThesis::where('status', 'Approved')->count();
        $this->totalDeniedThesisRequest = RequestThesis::where('status', 'Pending')->count();
    }


    public function render()
    {
        return view('livewire.dashboard');
    }
}
