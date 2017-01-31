<?php

namespace App\Models;

use Moloquent;
use App\Models\Scopes\CompanyScope;

class Settings extends Moloquent
{
    
    public function company(){
    	return $this->belongsTo(Company::class);
    }

    protected static function boot(){

        parent::boot();
        static::addGlobalScope(new CompanyScope);
    }

}
