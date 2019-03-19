<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Surveyoption extends Model
{ 
   protected $table = 'survey_options';
   protected $fillable = ['id','question_id','question'];
}

