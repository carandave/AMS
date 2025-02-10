<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\RequestThesis;
use App\Models\Thesis;
use Illuminate\Support\Carbon;

class Reports extends Component
{

    public $thesis_list;
    public $showRequestedReports;

    public $start;
    public $end;


    public function mount($showRequestedReports = true){
        $this->showRequestedReports = $showRequestedReports;
        
    }

    public function filter_date(){
        
    }

    public function render()
    {
        
        if($this->showRequestedReports){
            
            if($this->start && $this->end){
                $this->thesis_list = RequestThesis::where('status', 'Approved')
                                                  ->whereBetween('approved_date', [
                                                            Carbon::parse($this->start)->startOfDay(), 
                                                            Carbon::parse($this->end)->endOfDay()
                                                        ])  
                                                  ->with('thesis')->with('users')
                                                  ->get();
            }

            else{
                $this->thesis_list = RequestThesis::where('status', 'Approved')
                ->with('thesis')->with('users')
                ->get();
            }
            
        }
        else{

            if($this->start && $this->end){
                $this->thesis_list = Thesis::where('status', 'Approved')
                                        ->whereBetween('approval_date', [
                                            Carbon::parse($this->start)->startOfDay(), 
                                            Carbon::parse($this->end)->endOfDay()
                                        ])  
                                        ->with('user')
                                        ->with('department')
                                        ->with('sub_department')
                                        ->get();
            }
            else{
                $this->thesis_list = Thesis::where('status', 'Approved')
                                        ->with('user')
                                        ->with('department')
                                        ->with('sub_department')
                                        ->get();
            }
        }

        return view('livewire.reports');
    }
}
