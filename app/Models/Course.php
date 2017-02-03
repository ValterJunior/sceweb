<?php

namespace App\Models;

use App\Models\BaseCompanyModel;
use App\Models\Scopes\CompanyScope;

class Course extends BaseCompanyModel
{
    protected $fillable = [
      'name',
      'order'
   	];

   	public function series(){
      return $this->hasMany(Serie::class);
   	}

}
