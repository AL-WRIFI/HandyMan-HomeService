<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HandymanPreviousWorks extends Model
{
    use HasFactory;
    protected $fillable =[
        'handyman_id','image',
    ];

    public function handyman(){
        $this->belongsTo(Handyman::class,'handyman_id','id');
    }
}
