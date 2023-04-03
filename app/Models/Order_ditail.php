<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Factories\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Model;

class Order_ditail extends Model
{
    use HasFactory;

    protected $fillable=[
      'order_id','service_id','service_cost','quantity','total_cost'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
    public function service() 
    {
        return $this->belongsTo(Service::class,'service_id','id' );
    }
}
