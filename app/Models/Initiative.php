<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class initiative extends Model
{ 
   protected $table = 'initiatives';
   protected $fillable = ['id','title','slug','shortdesc','image','description','order','status','createdby'];
}
