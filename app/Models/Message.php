<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'message' ,'user_id','active'
    ];


    public function usermess(){

        return $this->belongsTo(User::class, 'user_id', 'id');

    }
    
}
