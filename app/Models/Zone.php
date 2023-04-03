<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;

    protected $fillable = [
     'name','city_id','status'
    ];

    public function ctiy()
    {
        return $this->belongsTo(City::class , 'ctiy_id' , 'id');
    }
    public function order() 
    {
        return $this->hasMany(Order::class , 'zone_id' , 'id');
    }
}
