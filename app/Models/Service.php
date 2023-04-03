<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\belongsTo;
use Illuminate\Database\Eloquent\Relations\hasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'name' , 'category_id' , 'description' ,'price' ,	'image' ,	'featured' ,	'status'
    ];

    protected $hidden = [ 'created_at','updated_at' ];
        
        public function category()
         {     
        return $this->belongsTo(Category::class, 'category_id', 'id');
         }
        
        public function scopeOfStatus($query ,$status){
           $query->where('status', '=', $status);
        }
        public function scopeActive($builder){
        $builder->where('status', 1);
        }
        public function Order_detail(){
        return $this->hasMany(Order_detail::class, 'service_id' ,'id');
        }
         



        public function scopeFilter(Builder $builder, $filters)
    {
        $options = array_merge([
            'category_id' => null,
            'featured' => null,
            'status' => 'active',
        ], $filters);

        $builder->when($options['status'], function ($query, $status) {
            return $query->where('status', $status);
        });

        $builder->when($options['featured'], function($query, $featured) {
            return $query->where('featured', $featured);
        });
        $builder->when($options['category_id'], function($query, $category_id) {
            return $query->where('category_id', $category_id);
        });
    
    }
        // public function scopeFilter(Builder $builder ,$filters){

        //     $options = array_merge([
        //      'category_id'=>null,
        //      'featured'=>null,
        //      'status' =>'active',
        //     ],$filters);

        // $builder->when($options['category_id'], function ($builder, $value) {
        //     $builder->where('category_id', $value);
        // });

        // $builder->when($options['featured'], function ($builder, $value) {
        //     $builder->where('featured', $value);
        // });

        // $builder->when($options['status'], function ($query, $status) {
        //     return $query->where('status', $status);
        // });

        // }
    
}
