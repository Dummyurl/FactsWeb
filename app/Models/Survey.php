<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{ 
   protected $table = 'survey';
   protected $fillable = ['question','day_poll','poll_date','question_type','status','createdby','visitor','device','survey_id'];
}

