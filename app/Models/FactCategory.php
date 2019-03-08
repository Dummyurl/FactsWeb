<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FactCategory extends Model
{ 
   protected $table = 'factcategories';
   protected $fillable = ['id','title','slug','status','image'];
}
