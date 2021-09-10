<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $with = ['dishes'];

    protected $fillable = [
        'payer_name',
        'payer_surname',
        'payer_address',
        'payer_email',
        'status',
        'total',
        'order_date'
    ];

    public function dishes(){
        return $this-> belongsToMany('App\Dish')->withPivot('quantity');
    }  
}
