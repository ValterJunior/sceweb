<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Models\Scopes\CompanyScope;

class BaseCompanyModel extends BaseModel
{

    protected static function boot(){

	    parent::boot();
	    static::addGlobalScope(new CompanyScope);
	}

}
