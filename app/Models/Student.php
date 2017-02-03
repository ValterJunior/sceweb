<?php

namespace App\Models;

use App\Models\BaseCompanyModel;

class Student extends BaseCompanyModel
{

   protected $fillable = [
      'enrollment_number',
      'name',
      'company_id',
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
