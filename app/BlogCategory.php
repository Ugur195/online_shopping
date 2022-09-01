<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    protected $table='online_shopping.blog_category';
    protected $fillable=['id','name','created_at','updated_at','slug','status'];
}
