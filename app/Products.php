<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'online_shopping.product';
    protected $fillable = ['id', 'name', 'slug', 'real_price', 'price', 'discount_price', 'count', 'real_count',
        'brand_id', 'category_id', 'raitng', 'images', 'description', 'reviews', 'created_at', 'updated_at', 'status'];
}
