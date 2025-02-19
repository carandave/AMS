<?php

namespace App\Livewire;


use Illuminate\Support\Facades\Log;
use App\Models\RequestThesis;
use App\Models\Thesis;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\DB;


class Dashboard extends Component
{
    public $totalThesisUploaded;
    public $totalPendingThesisRequest;
    public $totalApprovedThesisRequest;
    public $totalDeniedThesisRequest;

    public $myTotalPendingThesisRequest;
    public $myTotalApprovedThesisRequest;
    public $myTotalDeniedThesisRequest;

    public $chartData = [];
    public $chartDataRequest = [];

    public function mount()
    {
        $this->totalThesisUploaded = Thesis::where('status', 'Approved')->count();
        $this->totalPendingThesisRequest = RequestThesis::where('status', 'Pending')->count();
        $this->totalApprovedThesisRequest = RequestThesis::where('status', 'Approved')->count();
        $this->totalDeniedThesisRequest = RequestThesis::where('status', 'Denied')->count();

        $user = Auth::user();

        $this->myTotalPendingThesisRequest = RequestThesis::where('status', 'Pending')
                                                           ->where('user_id', $user->id)
                                                           ->count();

        $this->myTotalApprovedThesisRequest = RequestThesis::where('status', 'Approved')
                                                           ->where('user_id', $user->id)
                                                           ->count();

        $this->myTotalDeniedThesisRequest = RequestThesis::where('status', 'Denied')
                                                           ->where('user_id', $user->id)
                                                           ->count();
        
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
