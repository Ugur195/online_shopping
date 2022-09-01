<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table='online_shopping.role';
    protected $fillable=['id','name','slug '];
}
