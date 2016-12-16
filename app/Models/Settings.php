<?php

namespace App\Models;

use Moloquent;

class Settings extends Moloquent
{
    
    public function company(){
    	return $this->belongsTo(Company::class);
    }
}
