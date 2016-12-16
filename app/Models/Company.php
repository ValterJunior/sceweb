<?php

namespace App\Models;

use Moloquent;

class Company extends Moloquent
{
    protected $table = 'companies';
    
    public function users(){
    	return $this->hasMany(User::class);
    }
}
