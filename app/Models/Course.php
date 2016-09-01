<?php

namespace App\Models;

use Moloquent;

class Course extends Moloquent
{
    protected $fillable = [
      'name',
      'order'
   ];

   public function series(){
      return $this->hasMany(Serie::class);
   }

}
