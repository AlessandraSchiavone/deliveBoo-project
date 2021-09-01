<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'img',
        'description',
        'price',
        'gluten_free',
        'vegetarian',
        'vegan'  
    ];

    public function restaurant(){
        return $this->belongsTo('App\Restaurant');
    }
    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function orders(){
        return $this->belongsToMany('App\Order');
    }

}
