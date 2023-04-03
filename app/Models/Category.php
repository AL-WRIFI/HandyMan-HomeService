<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\belongsTo;
use Illuminate\Database\Eloquent\Relations\hasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','description','image','slug','status'
    ];

    protected $hidden = ['slug', 'created_at', 'updated_at'];
       
    
    public function services(){
        return $this->hasMany(Service::class, 'category_id','id');
    }
    public function handyman(){
        return $this->hasMany(Handyman::class, 'category_id','id');
    }
    public function orders(){
        return $this->hasMany(Order::class,'category_id','id');
    }
    public function getCategoryNameAttribute()
    {
        return $this->name;
    }
    // public function getStatusAttribute()
    // {
    //     return $this->status;
    // }
    // public function setStatusAttribute($value)
    // {
    //     $this->attributes['status'] =$value;
    // }
}
