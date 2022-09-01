<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OurTeam extends Model
{
    protected $table='online_shopping.our_team';
    protected $fillable=['id','user_id','our_team_role_id','description','created_at','updated_at'];
}
