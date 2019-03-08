<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facts extends Model
{ 
   protected $table = 'facts';
   protected $fillable = ['title','slug','image','status','shortdesc','order','createdby','description','category_id','like','public_date'];
}
