<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\RequestThesis;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\Thesis;
use App\Models\AuditTrail;
use App\Mail\ApprovedRequestDownloadEmail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;


class RequestThesisList extends Component
{

    use WithPagination;

    public $request_thesis;
    public $user_id;
    public $status = "Approved";
    public $showOwnRequestThesisList; 
    public $users = [];
    public $thesis_id;
    public $id;
    public $title, $purpose, $old_status;
    public $list_thesis;
    public $email;
    public $linkfile;

    public $search;
    

    public function editRequestThesis($thesis_id){
        $request_thesis = RequestThesis::with(['thesis', 'users', 'student'])->findOrFail($thesis_id);
        $this->id = $request_thesis->id;
        $this->email = $request_thesis->student->email;
        $this->user_id = $request_thesis->user_id;
        $this->thesis_id = $request_thesis->thesis_id;
        $this->title = $request_thesis->thesis->title;
        $this->linkfile = $request_thesis->thesis->file_path;
        $this->purpose = $request_thesis->purpose;
        $this->old_status = $request_thesis->status;
        
    }

    public function resetFields(){
        $this->user_id = "";
        $this->title = "";
        $this->purpose = "";
        $this->old_status = "";
    }

    public function mount($showOwnRequestThesisList = true){
        $this->showOwnRequestThesisList = $showOwnRequestThesisList;
        
    }

    public function render()
    {

        if($this->showOwnRequestThesisList){
            $user_id = Auth::user()->id;
            $this->request_thesis = RequestThesis::where('user_id', $user_id)
                                                   ->where('status', $this->status)
                                                   ->when($this->search, function ($query) {
                                                        return $query->whereHas('thesis', function ($q) {
                                                            $q->where('title', 'like', '%' . $this->search . '%');
                                                        });
                                                    })
                                                   ->with('thesis')->with('student')->get();
        }
        else{
            $this->users = User::where('role', 'Student')
                               ->where('status', 'Approved')
                                ->get();

            $this->request_thesis = RequestThesis::where('status', $this->status)
                                    ->when($this->search, function ($query) {
                                        return $query->whereHas('student', function ($q) {
                                            $q->where('first_name', 'like', '%' . $this->search . '%')
                                            ->orWhere('middle_name', 'like', '%' . $this->search . '%')
                                            ->orWhere('last_name', 'like', '%' . $this->search . '%');
                                        });
                                    })
                                    ->with('thesis')
                                    ->with('users')
                                    ->get();
                            
        }

        $this->list_thesis = Thesis::where('status', 'Approved')->get();
        

        // dd($this->request_thesis);

        return view('livewire.request-thesis-list');
    }

    public function admin_update_request_thesis(){
        
        if($this->old_status == "Pending"){

            $thesis = RequestThesis::findOrFail($this->id);

            // $user = User::findOrFail($this->user_id);

            $thesis->update([
                'purpose' => $this->purpose,
                'status' => $this->old_status,
            ]);

            // $approved_date = Carbon::parse($thesis->approved_date)->format('F j, Y');

            // Mail::to($this->email)->send(new ApprovedRequestDownloadEmail($user, $thesis->title, $thesis->status, $approved_date));
            

            AuditTrail::create([
                'user_id' => Auth::id(),
                'action' => "Update Request Thesis",
                'table_name' => "Request Thesis",
                'record_id' => $thesis->id,
            ]);
            

            if($thesis){
                $user_status = Auth::user()->role;

                if($user_status == "Admin"){
                    return redirect()->route('admin.request-thesis')->with('success_update_thesis', 'Successfully Updated Request Thesis');
                }
                elseif($user_status == "Faculty"){
                    return redirect()->route('faculty.request-thesis')->with('success_update_thesis', 'Successfully Updated Request Thesis');
                }
                
            }
    
            
        }

        elseif($this->old_status == "Approved"){
            $approved_by = Auth::user()->id;
           
            $thesis = RequestThesis::findOrFail($this->id);

            if($thesis->approved_date == NULL){
                $thesis->update([
                    'approved_by' => $approved_by,
                    'purpose' => $this->purpose,
                    'status' => $this->old_status,
                    'approved_date' => now()
                ]);
            }
            else{
                $thesis->update([
                    'approved_by' => $approved_by,
                    'purpose' => $this->purpose,
                    'status' => $this->old_status,
                ]);
            }

            $user = User::findOrFail($this->user_id);
            Mail::to($this->email)->send(new ApprovedRequestDownloadEmail($user, $this->title, $this->old_status, $this->linkfile));

            AuditTrail::create([
                'user_id' => Auth::id(),
                'action' => "Update Request Thesis",
                'table_name' => "Request Thesis",
                'record_id' => $thesis->id,
            ]);


            if($thesis){
                $user_status = Auth::user()->role;

                if($user_status == "Admin"){
                    return redirect()->route('admin.request-thesis')->with('success_update_thesis', 'Successfully Updated Request Thesis');
                }
                elseif($user_status == "Faculty"){
                    return redirect()->route('faculty.request-thesis')->with('success_update_thesis', 'Successfully Updated Request Thesis');
                }
            }
    
            
        }

        elseif($this->old_status == "Denied"){
           
            $thesis = RequestThesis::findOrFail($this->id);

            $thesis->update([
                'status' => $this->old_status,
            ]);

            $user = User::findOrFail($this->user_id);
            Mail::to($this->email)->send(new ApprovedRequestDownloadEmail($user, $this->title, $this->old_status, $this->linkfile));

            AuditTrail::create([
                'user_id' => Auth::id(),
                'action' => "Update Request Thesis",
                'table_name' => "Request Thesis",
                'record_id' => $thesis->id,
            ]);

            if($thesis){
            
                $user_status = Auth::user()->role;

                if($user_status == "Admin"){
                    return redirect()->route('admin.request-thesis')->with('success_update_thesis', 'Successfully Updated Request Thesis');
                }
                elseif($user_status == "Faculty"){
                    return redirect()->route('faculty.request-thesis')->with('success_update_thesis', 'Successfully Updated Request Thesis');
                }
            
            }
    
            
        }

        
        // $thesis = RequestThesis::findOrFail($this->id);

        // if($thesis){
        //     $thesis->update([
        //         'purpose' => $this->purpose,
        //         'status' => $this->old_status,
        //     ]);
    
        //     return redirect()->route('admin.request-thesis')->with('success_update_thesis', 'Successfully Updated Request Thesis');
        // }
    }

    public function student_update_request_thesis(){
        
        
        $thesis = RequestThesis::findOrFail($this->id);

        if($thesis){
            $thesis->update([
                'purpose' => $this->purpose,
                'status' => $this->old_status,
            ]);

            AuditTrail::create([
                'user_id' => Auth::id(),
                'action' => "Update Request Thesis",
                'table_name' => "Request Thesis",
                'record_id' => $thesis->id,
            ]);
    
            return redirect()->route('student.request-thesis')->with('success_update_thesis', 'Successfully Updated Request Thesis');
        }
    }

    public function delete($id){

        $thesis = RequestThesis::findOrFail($id);

        if($thesis){
            $thesis->delete();

            AuditTrail::create([
                'user_id' => Auth::id(),
                'action' => "Delete Request Thesis",
                'table_name' => "Request Thesis",
                'record_id' => $thesis->id,
            ]);
    
            return redirect()->route('student.request-thesis')->with('success_delete_thesis', 'Successfully Deleted Request Thesis');
        }

        
    }

    
}
