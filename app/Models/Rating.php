<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $fillable =[
        'user_id','handyman_id','order_id','rating','review'
    ];
    public function user(){
       return $this->belongsTo(Usar::class,'user_id','id');
    }
    public function handyman(){
       return $this->belongsTo(Handyman::class,'handyman_id','id');
    }
    protected static function boot(){

        parent::boot();

        static::saved( function ($rating) {
            $handyman = Handyman::find($rating->handyman_id);
            $avgRating = $handyman->ratings()->avg('rating');
            $ratingCount =$handyman->ratings()->count();
            $handyman->update([
                'avg_rating'   => $avgRating,
                'rating_count' => $ratingCount, 
            ]);
        });
    }
    
    
}
