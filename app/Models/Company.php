<?php

namespace App\Models;

use Moloquent;

class Company extends Moloquent
{
    
    public function users(){
    	return $this->hasMany(User::class);
    }
}
