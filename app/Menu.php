<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table='online_shopping.menu';
    protected $fillable=['id','name','slug','created_at','updated_at','status','page'];
}
