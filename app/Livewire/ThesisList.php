<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Thesis;
use App\Models\Department;
use App\Models\SubDepartment;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use App\Models\User;

class ThesisList extends Component
{

    use WithFileUploads;

    public $showOwnThesisList;
    public $departments_id, $departments_name;
    public $sub_departments_id, $sub_departments_name;
    public $subdepartments = [];

    public $thesis_id;
    public $user_id, $title, $year, $author, $adviser, $keywords, $abstract, $oldPhoto, $photo, $old_file_path, $file_path, $rejection_reason;

    public $submission_date;
    public $status = "Approved";
    public $old_status;
    public $currentUrl;
    public $users;

    protected function rules(){
        return [
            'title' => 'required',
            'year' => 'required',
            'author' => 'required',
            'adviser' => 'required',
            'keywords' => 'required',
            'user_id' => 'required',
            'departments_id' => 'required',
            'sub_departments_id' => 'nullable',
            'abstract' => 'required',
            'photo' => 'nullable|image|max:2048',
            'file_path' => 'nullable|file|mimes:pdf',
            'old_status' => 'nullable',
            'rejection_reason' => 'nullable',
        ];
    }

    public function resetFields(){
        $this->title = "";
        $this->year = "";
        $this->author = "";
        $this->adviser = "";
        $this->departments_id = "";
        $this->departments_name = "";
        $this->sub_departments_id = "";
        $this->sub_departments_name = "";
        // $this->sub_departments_name = $thesis->sub_department->name;
        $this->subdepartments = [];
        $this->submission_date = "";
        $this->keywords = "";
        $this->abstract = "";
        $this->photo = "";
        $this->file_path = "";
        $this->old_status = "";
        $this->rejection_reason = "";
    }

    public function mount($showOwnThesisList = true, $currentUrl){
        $this->showOwnThesisList = $showOwnThesisList;
        $this->currentUrl = $currentUrl;
    }

    public function render()
    {
        $departments = Department::paginate(10);

        if($this->showOwnThesisList){

            $user_id = Auth::user()->id;

            $list_thesis = Thesis::where('status', $this->status)->where('user_id', $user_id)->paginate(10);

            return view('livewire.thesis-list', ['list_thesis' => $list_thesis, 'departments' => $departments, 'subdepartments' => $this->subdepartments]);
        }
        else{

            $this->users = User::where('role', 'Student')
                            ->where('status', 'Approved')->get();

            $list_thesis = Thesis::where('status', $this->status)->with('user')->orderBy('id', 'desc')->paginate(10);

            return view('livewire.thesis-list', ['list_thesis' => $list_thesis, 'departments' => $departments, 'subdepartments' => $this->subdepartments]);
        }

        
    }

    public function updatedDepartmentsId(){
        
        if($this->departments_id){
            $this->subdepartments = SubDepartment::where('departments_id', $this->departments_id)->get();
        }
        else{
            $this->subdepartments = collect();
        }

        
        
    }

    public function editThesis($thesis_id){

        $thesis = Thesis::with(['department', 'sub_department'])->findOrFail($thesis_id);
        
        $this->thesis_id = $thesis->id;
        $this->user_id = $thesis->user_id;
        $this->title = $thesis->title;
        $this->year = $thesis->year;
        $this->author = $thesis->author;
        $this->adviser = $thesis->adviser;
        $this->departments_id = $thesis->department_id;
        $this->departments_name = $thesis->department->name;
        $this->sub_departments_id = $thesis->sub_department_id;
        $this->sub_departments_name = $thesis->sub_department->name;
        // $this->sub_departments_name = $thesis->sub_department->name;
        $this->subdepartments = SubDepartment::where('departments_id', $this->departments_id)->get();
        $this->submission_date = $thesis->submission_date;
        $this->keywords = $thesis->keywords;
        $this->abstract = $thesis->abstract;
        $this->oldPhoto = $thesis->photo;
        $this->old_file_path = $thesis->file_path;
        $this->old_status = $thesis->status;
        $this->rejection_reason = $thesis->rejection_reason;


        // $thesis = Thesis::findOrFail($id);
        // // return view('livewire.edit-thesis', ['thesis' => $thesis]);

        // return redirect()->route('student.list-thesis.edit', ['id' => $thesis->id]);
    }

    public function update_thesis(){

        $validated = $this->validate();

        $thesis = Thesis::findOrFail($this->thesis_id);

        if($this->photo){
            $photoPath = $this->photo->store('public');
        }

        else{
            $photoPath = $thesis->photo;
        }

        

        if($this->file_path){
            $filePath = $this->file_path->store('public');
        }

        else{
            $filePath = $thesis->file_path;
        }

        if($this->old_status == "Pending" || $this->old_status == "Denied"){
            $thesis->update([
                'title' => $validated['title'],
                'year' => $validated['year'],
                'author' => $validated['author'],
                'adviser' => $validated['adviser'],
                'keywords' => $validated['keywords'],
                'user_id' => $validated['user_id'],
                'departments_id' => $validated['departments_id'],
                'sub_departments_id' => $validated['sub_departments_id'],
                'abstract' => $validated['abstract'],
                'photo' => $photoPath,
                'file_path' => $filePath,
                'status' => $this->old_status,
                'rejection_reason' => $validated['rejection_reason'],
            ]);

            if($thesis){
                $role = Auth::user()->role;
    
                if($role == 'Admin'){
                    return redirect()->route('admin.list-thesis')->with('success_updated_thesis', 'Thesis Updated Successfully');
                }
    
                else{
                    return redirect()->route('student.my-list-thesis')->with('success_updated_thesis', 'Thesis Updated Successfully');
                }
                
            }
        }
        else{
            $thesis->update([
                'title' => $validated['title'],
                'year' => $validated['year'],
                'author' => $validated['author'],
                'adviser' => $validated['adviser'],
                'keywords' => $validated['keywords'],
                'user_id' => $validated['user_id'],
                'departments_id' => $validated['departments_id'],
                'sub_departments_id' => $validated['sub_departments_id'],
                'abstract' => $validated['abstract'],
                'photo' => $photoPath,
                'file_path' => $filePath,
                'status' => $this->old_status,
                'approval_date' => now(),
                'rejection_reason' => $validated['rejection_reason'],
            ]);

            if($thesis){
                $role = Auth::user()->role;
    
                if($role == 'Admin'){
                    return redirect()->route('admin.list-thesis')->with('success_updated_thesis', 'Thesis Updated Successfully');
                }
    
                else{
                    return redirect()->route('student.my-list-thesis')->with('success_updated_thesis', 'Thesis Updated Successfully');
                }
                
            }
        }
        

        
        

    }

    public function delete(Thesis $thesis){

        $thesis->delete();

        $user_status = Auth::user()->role;

        if($user_status == "Admin"){
            return redirect()->route('admin.list-thesis')->with('success_deleted_thesis', 'Thesis Deleted Successfully');
        }

        elseif($user_status == "Student"){
            return redirect()->route('student.my-list-thesis')->with('success_deleted_thesis', 'Thesis Deleted Successfully');
        }
        
    }

    public function archive($thesis_id){
        
        $thesis = Thesis::findOrFail($thesis_id);

        $thesis->update([
            'status' => "Archived"
        ]);

        if($thesis){
            return redirect()->route('admin.list-thesis')->with('success_archived_thesis', 'Thesis Archived Successfully');
        }

        
    }

    public function unarchive($thesis_id){
        
        $thesis = Thesis::findOrFail($thesis_id);

        $thesis->update([
            'status' => "Approved"
        ]);

        if($thesis){
            $user_status = Auth::user()->role;

            if($user_status == "Admin"){
                return redirect()->route('admin.list-thesis')->with('success_unarchived_thesis', 'Thesis Unarchived Successfully');
            }

            elseif($user_status == "Student"){
                return redirect()->route('student.my-list-thesis')->with('success_unarchived_thesis', 'Thesis Unarchived Successfully');
            }
        }
    }

    public function requestThesis($thesis_id){

        $thesis = Thesis::with(['department', 'sub_department'])->findOrFail($thesis_id);
        
        $this->thesis_id = $thesis->id;
        $this->user_id = $thesis->user_id;
        $this->title = $thesis->title;
        $this->year = $thesis->year;
        $this->author = $thesis->author;
        $this->adviser = $thesis->adviser;
        $this->departments_id = $thesis->department_id;
        $this->departments_name = $thesis->department->name;
        $this->sub_departments_id = $thesis->sub_department_id;
        $this->sub_departments_name = $thesis->sub_department->name;
        // $this->sub_departments_name = $thesis->sub_department->name;
        $this->subdepartments = SubDepartment::where('departments_id', $this->departments_id)->get();
        $this->submission_date = $thesis->submission_date;
        $this->keywords = $thesis->keywords;
        $this->abstract = $thesis->abstract;
        $this->oldPhoto = $thesis->photo;
        $this->old_file_path = $thesis->file_path;
        $this->old_status = $thesis->status;
        $this->rejection_reason = $thesis->rejection_reason;


        // $thesis = Thesis::findOrFail($id);
        // // return view('livewire.edit-thesis', ['thesis' => $thesis]);

        // return redirect()->route('student.list-thesis.edit', ['id' => $thesis->id]);
    }

    
}
