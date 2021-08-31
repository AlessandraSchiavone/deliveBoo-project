<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = [
        'name','phone_number', 'description', 'img', 'location','opening_time','closure_time', 'price_shipping', 'price_rating','slug'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function dishes(){
        return $this->hasMany('App\Dish');
    }

    public function cuisines(){
        return $this->belongsToMany('App\Cuisine');
    }
}
