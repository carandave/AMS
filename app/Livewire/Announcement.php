<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Announcements;
use App\Models\AuditTrail;
use Illuminate\Support\Facades\Auth;

class Announcement extends Component
{

    public $search;

    public $title;
    public $content;
    public $id;
    public $status = "Active";

    protected function rules(){
        
        return [
            'title' => 'required',
            'content' => 'required'
        ];
    }

    public function resetFields()
    {
        $this->title = '';
        $this->content = '';
    }

    public function render()
    {
        $announcement = Announcements::when($this->search, function($query){
                        return $query->where('title', 'like', '%' . $this->search . '%');
                    })
                    ->where('status', $this->status)
                    ->orderBy('id', 'desc')
                    ->paginate(10);

        return view('livewire.announcement', ['announcement' => $announcement]);
    }

    public function store_announcement(){
        $validated = $this->validate();

        $announcement = Announcements::create([
            'title' => $validated['title'],
            'status' => "Active",
            'content' => $validated['content']
            ]
        );

        AuditTrail::create([
            'user_id' => Auth::id(),
            'action' => "Create New Announcement",
            'table_name' => "Announcement",
            'record_id' => $announcement->id,
        ]);

        if($announcement){
            return redirect()->route('admin.announcement')->with('success_announcement', 'Announcement Created Successfully');
        }
    }

    public function editAnnouncement($announcement_id){

        $announce = Announcements::findOrFail($announcement_id);
        
        $this->id = $announce->id;
        $this->title = $announce->title;
        $this->content = $announce->content;
        $this->status = $announce->status;

    }

    public function update_announcement(){
        
        // dd($this->id, $this->departments_id, $this->name);

        $validated = $this->validate([
            'title' => 'required',
            'content' => 'required',
            'status' => 'required'
        ]);

        $announcement = Announcements::findOrFail($this->id);

        $announcement->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'status' => $validated['status']
        ]);

        AuditTrail::create([
            'user_id' => Auth::id(),
            'action' => "Update Announcement",
            'table_name' => "Announcement",
            'record_id' => $announcement->id,
        ]);

        if($announcement){
            return redirect()->route('admin.announcement')->with('success_edit_announcement', 'Announcement Updated Successfully');
        }
        

        
    }
}
