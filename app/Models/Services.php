<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{ 
   protected $table = 'services';
   protected $fillable = ['id','title','slug','shortdesc','image','description','order','status','createdby'];
}
