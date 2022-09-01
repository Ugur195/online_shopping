<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table = 'online_shopping.coments';
    protected $fillable = ['id', 'full_name', 'email', 'texts', 'product_id', 'parent_id', 'slug', 'created_at', 'updated_at', 'status', 'user_id'];

    public function myParentComment()
    {
        return $this->hasMany('App\Comments', 'parent_id');
    }

    public function myUsersForComment()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

}
