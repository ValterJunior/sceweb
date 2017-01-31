<?php

namespace App\Models;

use Moloquent;
use App\Models\Scopes\CompanyScope;

class Student extends Moloquent
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

   protected static function boot(){

       parent::boot();
       static::addGlobalScope(new CompanyScope);
   }   

}
