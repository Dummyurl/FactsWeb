<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyForms extends Model
{ 
   protected $table = 'survey_forms';
   protected $fillable = ['id','question','status','createdby','question_id','survey_id','question_type'];
}

