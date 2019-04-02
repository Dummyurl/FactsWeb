<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyCompany extends Model
{ 
   protected $table = 'survey_companies';
   protected $fillable = ['id','title','slug','shortdesc','image','description'];
}


