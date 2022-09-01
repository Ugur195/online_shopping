<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    protected $table='online_shopping.about_us';
    protected $fillable=['id','title','description','image','our_mission','our_vision','why_us','who_we_are','created_at','updated_at'];
}
