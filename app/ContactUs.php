<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $table='online_shopping.contact_us';
    protected $fillable=['id','full_name','subject','messages','email','created_at','updated_at','status','slug','read_unread'];

}
