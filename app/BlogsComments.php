<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogsComments extends Model
{
    protected $table = 'online_shopping.blogs_comments';
    protected $fillable = ['id', 'full_name', 'email', 'texts', 'blog_id', 'parent_id', 'slug', 'created_at', 'updated_at', 'status','user_id'];


    public function myParentBlogsComments()
    {
        return $this->hasMany('App\BlogsComments', 'parent_id');
    }

    public function myUsersForBlogsComments()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

}





