<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteProfile extends Model
{ 
   protected $table = 'siteprofiles';
   protected $fillable = ['created_at','updated_at','sitename','siteslogan','sikiptocontent','addressone','addresstwo','location','mobileno','phoneone','phonetwo','copytext','facebook','twitter','youtube','linkedin','instagram','owner','metatitle','metadescription','logo'];
}

