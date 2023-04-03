<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_image extends Model
{
    use HasFactory;

    protected $fillable =[
        'order_id', 'image'
    ];


    public function order()
    {
        return $this->belongsTo(Order::Class,'order_id','id');
    }
}
