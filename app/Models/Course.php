<?php

namespace App\Models;

use Moloquent;
use App\Models\Scopes\CompanyScope;

class Course extends Moloquent
{
    protected $fillable = [
      'name',
      'order'
   	];

   	public function series(){
      return $this->hasMany(Serie::class);
   	}

	protected static function boot(){

	    parent::boot();
	    static::addGlobalScope(new CompanyScope);
	}

}
