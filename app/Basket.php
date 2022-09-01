<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    protected $table='online_shopping.basket';
    protected $fillable=['id','user_id','product_id','product_count','payment','created_at','updated_at','slug','status'];
}
