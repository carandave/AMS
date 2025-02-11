<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class AuditTrail extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'action', 'table_name', 'record_id'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    
}
