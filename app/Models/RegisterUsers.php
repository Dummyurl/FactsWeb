<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegisterUsers extends Model
{ 
   protected $table = 'register_users';
   protected $fillable = ['id','email','name','photo_url','district','province','ward','latitude','longitude','birth_year','provider','gender','municipality','street','token'];
}
