<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Scopes\CompanyScope;

class Matter extends Model
{
    
	protected static function boot(){

	    parent::boot();
	    static::addGlobalScope(new CompanyScope);
	}

	public function serie(){
		return $this->belongsTo(Serie::class);
	}

}
