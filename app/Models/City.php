<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\belongsTo;
use Illuminate\Database\Eloquent\Relations\hasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'status'
    ];

    public function zones(): HasMany 
    {
        return $this->hasMany(Zone::class, 'city_id' ,'id');
    }
}
