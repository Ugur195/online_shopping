<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OurTeamRoles extends Model
{
    protected $table = 'online_shopping.roles_our_team';
    protected $fillable = ['id', 'name', 'created_at', 'updated_at'];
}
