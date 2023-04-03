<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Factories\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Model;
class Order extends Model
{
    use HasFactory;
    protected $fillable =[
        'user_id','number','category_id','handyman_id','note','dateTimeService',
        'city_id','zone_id','address_note','orderType','status','total_cost'
    ];
    protected $primaryKey = 'id';
    public function user()
    {
        return $this->belongsTo(User::Class,'user_id','id');
    }
    public function zone()
    {
        return $this->belongsTo(Zone::Class,'zone_id','id');
    }
    public function city()
    {
        return $this->belongsTo(City::Class,'city_id','id');
    }
    public function handyman()
    {
        return $this->belongsTo(Handyman::Class, 'handyman_id', 'id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class , 'category_id' , 'id');
    }
    public function detail()
    {
        return $this->hasMany(Order_ditail::Class,'order_id' ,'id');
    }
    public function image()
    {
        return $this->hasMany(Order_image::Class,'order_id' ,'id');
    }
    public function serviceZone()
    {
        return $this->belongsTo(Servicelocation::Class,'zone_id' ,'id');
    }
    public function scopeOrder_status($query ,$status){
        $query->where('order_status', '=', $status);
    }
    
    public static function getNextOrderNumber()
    {
        $year =  Carbon::now()->year;
        $number = Order::whereYear('created_at', $year)->max('number');
        if ($number) {
            return $number + 1;
        }
        return $year . '0001';
    }

    protected static function booted()
    {
        static::creating(function(Order $order) {
            $order->number = Order::getNextOrderNumber();
        });
    }
    public function payment_method(){
        return $this->hasMany(Order_detail::Class,'order_id');
    }

    public function payment(){
        return $this->hasMany(Order_detail::Class,'order_id');
    }

    public function orders_status_id(){
        return $this->hasMany(Order_detail::Class,'order_id');
    }

    
    
}
