<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;
use App\Models\SubDepartment;

class Thesis extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'abstract',
        'author',
        'year',
        'keywords',
        'user_id',
        'department_id',
        'sub_department_id',
        'adviser',
        'submission_date',
        'status',
        'photo',
        'file_path',
        'approval_date',
        'rejection_reason',
    ];
    

    public function department(){
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function sub_department(){
        return $this->belongsTo(SubDepartment::class, 'sub_department_id');
    }

    
}
