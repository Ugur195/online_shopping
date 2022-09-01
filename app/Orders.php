<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table='online_shopping.orders';
    protected $fillable=['id','users_id','address','status','created_at','updated_at'];
}
