<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table='online_shopping.settings';
    protected $fillable=['id','logo','email','mobile','address','slug','blog_video','created_at','updated_at','status'];
}
