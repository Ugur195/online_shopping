<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slideshow extends Model
{
    protected $table='online_shopping.slideshow';
    protected $fillable=['id','title','description','image','url','created_at','updated_at','status'];
}
