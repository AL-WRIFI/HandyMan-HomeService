<?php

namespace App\Models\Provider;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;
use Illuminate\Database\Eloquent\Relations\hasMany;


class Provider extends Model
{
    use HasFactory;
    protected $fillable = [
         'user_id','name','image','phone','email','password','address',
        'category_id','description','identity_type',
        'identity_Number','identification_Image','status'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
