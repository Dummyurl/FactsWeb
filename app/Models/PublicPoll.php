<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PublicPoll extends Model
{ 
   protected $table = 'publicpoll';
   protected $fillable = ['question','day_poll','poll_date','question_type','status','createdby','visitor','device'];
}

