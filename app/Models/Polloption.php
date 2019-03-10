<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Polloption extends Model
{ 
   protected $table = 'polloption';
   protected $fillable = ['id','question_id','question'];
}

