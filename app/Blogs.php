<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    protected $table='online_shopping.blogs';
    protected $fillable=['id','images','header','description','author','category_id','created_at','updated_at','slug','status'];
}
