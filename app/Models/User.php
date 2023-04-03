<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'image',
        'order_count',
        'status',
        'userType',
        'password'
        
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function message(){
        return $this->belongsToMany(Message::class, 'user_id', 'id');
    }

    // public function providers(): HasMany
    // {
    //     return $this->hasMany(Provider::class, 'user_id', 'id');
    // }

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id', 'id');
    }
    public function rating(){
        return $this->hasMany(Rating::class, 'user_id','id');
    }
    public function getUserNameAttribute()
    {
        return $this->name;
    }
}
