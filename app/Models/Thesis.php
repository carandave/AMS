<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'statys',
        'photo',
        'file_path',
        'approval_date',
        'rejection_reason',
    ];
}
