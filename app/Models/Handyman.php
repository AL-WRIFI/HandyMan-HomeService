<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Handyman extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $gurad ='handyman';
    protected $table ='handyman';
    protected $fillable = [
        'name', 'email', 'password', 'email_verified_at','phone','image', 'city_id','zone_id', 'address_note',
        'category_id', 'description','identity_type','identity_Number',
        'identification_Image','working_days','order_count','rating_count','avg_rating','status','featured','accepted'
    ];
    protected $hidden = [
        'password','remember_token',
    ];
    public function orders()
    {
        return $this->hasMany(Order::Class,'handyman_id' ,'id');
    }
    public function category()
    {
        return $this->belongsTo(Category::Class,'category_id' ,'id');
    }
    public function city()
    {
        return $this->belongsTo(City::Class,'city_id' ,'id');
    }
    public function zone()
    {
        return $this->belongsTo(Zone::Class,'zone_id' ,'id');
    }
    public function ratings(){
        return $this->hasMany(Rating::class, 'handyman_id','id');
    }
    public function previousWorks(){
        return $this->hasMany(HandymanPreviousWorks::class, 'handyman_id','id');
    }

    public function ratingCount(){
        return $this->ratings()->count();
    }
    public function AvgRating(){
        return $this->ratings()->pluck('rating')->avg();
    }
    // public function setAvgRating(){
    //     $this->avg_rating= $this->rating()->pluck('rating')->avg();
    // }
    // public function setCountRating(){
    //     $this->rating_count= $this->rating()->count();;
    // }
    
    public function getGurad() {
		return $this->gurad;
	}
	public function setGurad($gurad): self {
		$this->gurad = $gurad;
		return $this;
	}
    
    protected $casts = [
        'email_verified_at' => 'datetime','working_days' => 'json',
    ];
    
	
    
    public function setWorkingDaysAttribute($value)
    {
        $this->attributes['working_days'] = json_encode($value);
    }

    public function getWorkingDaysJsonAttribute($value)
    {
        return json_decode($value, true);
    }

}
