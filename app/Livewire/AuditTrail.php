<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\AuditTrail;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class AuditTrail extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $audit_trail;

    public function render()
    {

        $audit_trail = AuditTrail::with('user')->paginate(10);

        return view('livewire.audit-trail', ['audit_trail' => $audit_trail]);
    }
}
