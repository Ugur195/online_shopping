<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
    protected $table='online_shopping.brand';
    protected $fillable=['id','logo','name','slug','created_at','updated_at','status'];
}
