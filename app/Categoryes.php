<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoryes extends Model
{
    protected $table='online_shopping.categry';
    protected $fillable=['id','logo','name','slug','created_at','updated_at','status'];
}
