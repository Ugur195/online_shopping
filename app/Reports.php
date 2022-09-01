<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reports extends Model
{
    protected $table = 'online_shopping.reports';
    protected $fillable = ['id', 'product_id', 'profit', 'slug', 'created_at', 'updated_at'];
}
