<?php

namespace App\Models;

use Moloquent;

class Student extends Moloquent
{

   protected $fillable = [
      'enrollment_number',
      'name',
      'serie_id',
      'birth_date',
      'gender',
      'father_name',
      'mother_name',
      'address_name',
      'address_number',
      'address_neighbor',
      'address_city',
      'address_state',
      'phone_number',
      'discount'
   ];

   public function serie(){
      return $this->belongsTo(Serie::class);
   }

}
