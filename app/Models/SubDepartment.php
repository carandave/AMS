<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;

class SubDepartment extends Model
{
    use HasFactory;

    protected $fillable = ['departments_id', 'name'];

    public function department(){
        return $this->belongsTo(Department::class, 'departments_id');
    }
}
