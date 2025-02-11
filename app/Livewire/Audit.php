<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\AuditTrail;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class Audit extends Component
{

    use WithPagination, WithoutUrlPagination;

    public $search;

    public function render()
    {

        $audit_trail = AuditTrail::with('user')
                    ->when($this->search, function($query){
                        return $query->whereHas('user', function($q){
                            return $q->where('first_name', 'like', '%' . $this->search . '%')
                                     ->orWhere('middle_name', 'like', '%' . $this->search . '%')
                                     ->orWhere('last_name', 'like', '%' . $this->search . '%');
                        });
                    })
                    ->orderBy('id', 'desc')
                    ->paginate(10);

        return view('livewire.audit', ['audit_trail' => $audit_trail]);
    }
}
