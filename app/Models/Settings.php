<?php

namespace App\Models;

use App\Models\BaseCompanyModel;

class Settings extends BaseCompanyModel
{
    
    public function company(){
    	return $this->belongsTo(Company::class);
    }

}
