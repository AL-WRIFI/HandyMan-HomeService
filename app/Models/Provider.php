<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\belongsTo;
use Illuminate\Database\Eloquent\Relations\hasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Foundation\Auth\User;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Provider extends Authenticatable
{
    use HasFactory ;
    

    
    protected $fillable = [
        'name','email','email_verified_at','password','phone','image','address',
        'category_id','description','identity_type',
        'identity_Number','identification_Image','status','featured','accepted'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function orders():hasMany
    {
        return $this->hasMany(Order::Class,'provider_id' ,'id');
    }
}
