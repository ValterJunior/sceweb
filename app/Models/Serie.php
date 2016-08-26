<?php

namespace App\Models;

use Moloquent;

class Serie extends Moloquent
{
    protected $fillable = [
      'name',
      'course_id',
      'order'
   ];

   public function course(){
      return $this->belongsTo(Course::class);
   }

}
