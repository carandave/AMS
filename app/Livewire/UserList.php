<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Mail\ApprovedRegistrationEmail;
use Illuminate\Support\Facades\Mail;
use App\Models\AuditTrail;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;


class UserList extends Component
{

    use WithPagination, WithoutUrlPagination, WithFileUploads;

    public $search = ''; // Property for storing the search input
    public $status = 'Approved';
    public $showStudentList = false; // To determine whether to show pending users

    public $user = [];


    public $id, $first_name, $last_name, $middle_name, $student_id, $type, $email, $photo; 

    protected function rules(){
        if($this->student_id){
            return ['first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'student_id' => 'required|unique:users,student_id',
            'email' => 'required|unique:users,email', 
            'photo' => 'required|image|max:1024'];
        }
        else{
            return ['first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'student_id' => 'nullable',
            'type' => 'required',
            'email' => 'required|unique:users,email', 
            'photo' => 'required|image|max:1024'];
        }
        
    }

    public function resetFields()
    {
        $this->id = '';
        $this->first_name = '';
        $this->middle_name = '';
        $this->last_name = '';
        $this->student_id = '';
        $this->type = '';
        $this->email = '';
        $this->photo = null;
    }

    public function editUser(User $user){
        $this->id = $user->id;
        $this->first_name = $user->first_name;
        $this->middle_name = $user->middle_name;
        $this->last_name = $user->last_name;
        $this->student_id = $user->student_id;
        $this->type = $user->type;
        $this->email = $user->email;

        $this->type = $user->role;
        // $this->photo = $user->photo;

    }

    public function update_student(){

        $validated = $this->validate(['first_name' => 'required',
        'middle_name' => 'required',
        'last_name' => 'required',
        'student_id' => 'required|unique:users,student_id,' . $this->student_id . ',student_id',
        'status' => 'required',
        'email' => 'required|unique:users,email,' . $this->email . ',email', 
        'photo' => 'nullable|image|max:1024']);


        
        $user = User::findorFail($this->id);
        

        if($this->photo){
            $photoPath = $this->photo->store('public');
        }
        else{
            $photoPath = $user->photo;
        }

        // dd($user->status);

        $date_to_day = Carbon::now();
        $formattedDateToDay = $date_to_day->format('F j, Y');

        if($user->status === "Approved"){
            $user->update([
                'first_name' => $validated['first_name'],
                'middle_name' => $validated['middle_name'],
                'last_name' =>  $validated['last_name'],
                'student_id' =>  $validated['student_id'],
                'status' =>  $validated['status'],
                'email' =>  $validated['email'],
                'photo' => $photoPath
            ]);

        }

        else{
            if($validated['status'] === "Approved"){

                $newPassword = Str::random(8);

                Mail::to($validated['email'])->send(new ApprovedRegistrationEmail($user, $formattedDateToDay, $validated['status'], $newPassword));

                $hashedPassword = Hash::make($newPassword);
                
                $user->update([
                    'first_name' => $validated['first_name'],
                    'middle_name' => $validated['middle_name'],
                    'last_name' =>  $validated['last_name'],
                    'student_id' =>  $validated['student_id'],
                    'status' =>  $validated['status'],
                    'email' =>  $validated['email'],
                    'photo' => $photoPath,
                    'password' => $hashedPassword
                ]);

                

            }

            else if($validated['status'] === "Denied"){

                $newPassword = Str::random(8);
            
                Mail::to($validated['email'])->send(new ApprovedRegistrationEmail($user, $formattedDateToDay, $validated['status'], $newPassword));

                $hashedPassword = Hash::make($newPassword);

                $user->update([
                    'first_name' => $validated['first_name'],
                    'middle_name' => $validated['middle_name'],
                    'last_name' =>  $validated['last_name'],
                    'student_id' =>  $validated['student_id'],
                    'status' =>  $validated['status'],
                    'email' =>  $validated['email'],
                    'photo' => $photoPath
                ]);

            }

            else{
                $user->update([
                    'first_name' => $validated['first_name'],
                    'middle_name' => $validated['middle_name'],
                    'last_name' =>  $validated['last_name'],
                    'student_id' =>  $validated['student_id'],
                    'status' =>  $validated['status'],
                    'email' =>  $validated['email'],
                    'photo' => $photoPath
                ]);

            }
        }

        AuditTrail::create([
            'user_id' => Auth::id(),
            'action' => "Update Student",
            'table_name' => "Users",
            'record_id' => $user->id,
        ]);

        return redirect()->route('admin.users.student')->with('success_edit_student', 'Student Updated Successfully');
        
    }

    public function update_official(){

        $validated = $this->validate(['first_name' => 'required',
        'middle_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|unique:users,email,' . $this->email . ',email', 
        'type' => 'required',
        'photo' => 'nullable|image|max:1024']);
        
        $user = User::findorFail($this->id);

        if($this->photo){
            $photoPath = $this->photo->store('public');
        }
        else{
            $photoPath = $user->photo;
        }

        $user->update([
            'first_name' => $validated['first_name'],
            'middle_name' => $validated['middle_name'],
            'last_name' =>  $validated['last_name'],
            'role' =>  $validated['type'],
            'email' =>  $validated['email'],
            'photo' => $photoPath
        ]);

        AuditTrail::create([
            'user_id' => Auth::id(),
            'action' => "Update Official",
            'table_name' => "Users",
            'record_id' => $user->id,
        ]);

        return redirect()->route('admin.users.admin')->with('success_edit_official', 'Official Updated Successfully');
        
        
        
    }

    public function store_student()
    {
        
        $validated = $this->validate();

        
        $validated['photo'] = $this->photo;
        
        $newPassword = Str::password(12);

        $date_to_day = Carbon::now();
        $formattedDateToDay = $date_to_day->format('F j, Y');

        $user = User::create([
            'first_name' => $validated['first_name'],
            'middle_name' => $validated['middle_name'],
            'last_name' =>  $validated['last_name'],
            'student_id' =>  $validated['student_id'],
            'role' =>  'Student',
            'status' => 'Approved',
            'email' =>  $validated['email'],
            'password' => Hash::make($newPassword),
            'photo' => $validated['photo']->store('public'),
        ]);

        AuditTrail::create([
            'user_id' => Auth::id(),
            'action' => "Create New Student",
            'table_name' => "Users",
            'record_id' => $user->id,
        ]);

        $status = "New Account";

        if($user){

            Mail::to($validated['email'])->send(new ApprovedRegistrationEmail($user, $formattedDateToDay, $status, $newPassword));


            return redirect()->route('admin.users.student')->with('success_student', 'Student Created Successfully');
        }

    }


    public function store_official()
    {
        
        $validated = $this->validate();

        $validated['photo'] = $this->photo;
        
        $newPassword = Str::random(8);

        $date_to_day = Carbon::now();
        $formattedDateToDay = $date_to_day->format('F j, Y');

        $user = User::create([
            'first_name' => $validated['first_name'],
            'middle_name' => $validated['middle_name'],
            'last_name' =>  $validated['last_name'],
            'student_id' => null,
            'role' =>  $validated['type'],
            'status' => 'Approved',
            'email' =>  $validated['email'],
            'password' => Hash::make($newPassword),
            'photo' => $validated['photo']->store('public'),
        ]);

        AuditTrail::create([
            'user_id' => Auth::id(),
            'action' => "Create New Official",
            'table_name' => "Users",
            'record_id' => $user->id,
        ]);

        $status = "New Account";

        if($user){

            Mail::to($validated['email'])->send(new ApprovedRegistrationEmail($user, $formattedDateToDay, $status, $newPassword));

            return redirect()->route('admin.users.admin')->with('success_official', 'Official Created Successfully');
        }
        

    }

    public function mount($showStudentList = false)
    {
        $this->showStudentList = $showStudentList; // Initialize showPending state
    }

    public function render()
    {

        // if showStudentList is true it will go to this code 
        if($this->showStudentList){
            $users = User::orderBy('created_at', 'desc')
                ->when($this->search, function($query){
                    return $query->where(function($query){
                        $query->where('first_name', 'like', '%' . $this->search . '%')
                        ->orWhere('middle_name', 'like', '%' . $this->search . '%')
                        ->orWhere('last_name', 'like', '%' . $this->search . '%')
                        ->orWhere('student_id', 'like', '%' . $this->search . '%')
                        ->orWhere('email', 'like', '%' . $this->search . '%');
                    });
                })
                ->where('status', $this->status)
                ->where('role', 'Student')
                ->paginate(10); 
    
            $this->resetPage();
    
            return view('livewire.user-list', [
                'users' => $users,
            ]);
        }

        // if showStudentList is false it will go to this code 
        else if(!$this->showStudentList){
            $users = User::orderBy('created_at', 'desc')
                ->when($this->search, function($query){
                    return $query->where(function($query){
                        $query->where('first_name', 'like', '%' . $this->search . '%')
                        ->orWhere('middle_name', 'like', '%' . $this->search . '%')
                        ->orWhere('last_name', 'like', '%' . $this->search . '%')
                        ->orWhere('email', 'like', '%' . $this->search . '%');
                    });
                })
                ->where(function ($query){
                    $query->where('status', $this->status)
                    ->where(function ($subQuery){
                        $subQuery->where('role', 'Admin')
                        ->orWhere('role', 'Faculty');
                    });
                })->paginate(10);
            
            // ->where('status', $this->status)
            //   ->where('role', 'Admin')->paginate(10); 
    
            $this->resetPage();
    
            return view('livewire.user-list', [
                'users' => $users,
            ]);
        }
        

    }

    

    

    // public function archiveUser($id){
    //     $user = User::find($id);

    //     $this->id = $user->id;

    // }

    public function archive($userId){

        $user = User::findorFail($userId);

        if($user->role == "Student"){
            if($user->status == "Archived"){
            $user->update([
                'status' => 'Approved'
            ]);

            AuditTrail::create([
                'user_id' => Auth::id(),
                'action' => "Unarchive Student",
                'table_name' => "Users",
                'record_id' => $user->id,
            ]);
    
            return redirect()->route('admin.users.student')->with('success_archive_student', 'Student Successfully Unarchived');
            }

            elseif($user->status != "Archived"){
                $user->update([
                    'status' => 'Archived'
                ]);

                AuditTrail::create([
                    'user_id' => Auth::id(),
                    'action' => "Archive Student",
                    'table_name' => "Users",
                    'record_id' => $user->id,
                ]);
        
                return redirect()->route('admin.users.student')->with('success_archive_student', 'Student Successfully Archived');
            }

            
        }

        else{
            if($user->status == "Archived"){
                $user->update([
                    'status' => 'Approved'
                ]);

                AuditTrail::create([
                    'user_id' => Auth::id(),
                    'action' => "Unarchive Official",
                    'table_name' => "Users",
                    'record_id' => $user->id,
                ]);
        
                return redirect()->route('admin.users.admin')->with('success_archive_official', 'Official Successfully Unarchived');
            }
    
            elseif($user->status != "Archived"){
                $user->update([
                    'status' => 'Archived'
                ]);

                AuditTrail::create([
                    'user_id' => Auth::id(),
                    'action' => "Archive Official",
                    'table_name' => "Users",
                    'record_id' => $user->id,
                ]);
        
                return redirect()->route('admin.users.admin')->with('success_archive_official', 'Official Successfully Archived');
            }

            
        }

        

    }

    

    

}


