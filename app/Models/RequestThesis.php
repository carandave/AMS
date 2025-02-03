<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Thesis;
use App\Models\User;

class RequestThesis extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'thesis_id',
        'approved_by',
        'status',
        'purpose',
        'approved_date',
    ];

    public function thesis(){
        return $this->belongsTo(Thesis::class, 'thesis_id');
    }

    public function users(){
        return $this->belongsTo(User::class, 'approved_by');
    }

    
}
