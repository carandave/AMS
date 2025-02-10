<?php

namespace App\Livewire;


use Illuminate\Support\Facades\Log;
use App\Models\RequestThesis;
use App\Models\Thesis;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\DB;


class Dashboard extends Component
{
    public $totalThesisUploaded;
    public $totalPendingThesisRequest;
    public $totalApprovedThesisRequest;
    public $totalDeniedThesisRequest;

    public $chartData = [];
    public $chartDataRequest = [];

    public function mount()
    {
        $this->totalThesisUploaded = Thesis::where('status', 'Approved')->count();
        $this->totalPendingThesisRequest = RequestThesis::where('status', 'Pending')->count();
        $this->totalApprovedThesisRequest = RequestThesis::where('status', 'Approved')->count();
        $this->totalDeniedThesisRequest = RequestThesis::where('status', 'Pending')->count();
        
        // Fix query processing
        $data = DB::table('theses')
        ->selectRaw('YEAR(created_at) as year, COUNT(*) as count')
        ->where('status', 'Approved')
        ->groupBy('year')
        ->orderBy('year', 'ASC')
        ->get();

        // Manually format data to avoid overwriting duplicate years
        $chartData = [];
        foreach ($data as $row) {
            if (!isset($chartData[$row->year])) {
                $chartData[$row->year] = 0;
            }
            $chartData[$row->year] += $row->count; // Sum values correctly
        }

        $this->chartData = $chartData; // Assign fixed data



        // Fix query processing
        $data = DB::table('request_theses')
        ->selectRaw('YEAR(created_at) as year, COUNT(*) as count')
        ->where('status', 'Approved')
        ->groupBy('year')
        ->orderBy('year', 'ASC')
        ->get();

        // Manually format data to avoid overwriting duplicate years
        $chartDataRequest = [];
        foreach ($data as $row) {
            if (!isset($chartDataRequest[$row->year])) {
                $chartDataRequest[$row->year] = 0;
            }
            $chartDataRequest[$row->year] += $row->count; // Sum values correctly
        }

        $this->chartDataRequest = $chartDataRequest; // Assign fixed data

    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
