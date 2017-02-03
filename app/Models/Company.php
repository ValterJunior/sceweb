<?php

namespace App\Models;

use App\Models\BaseModel;

class Company extends BaseModel
{
    protected $table = 'companies';
    
    public function users(){
    	return $this->hasMany(User::class);
    }

    public function students(){
    	return $this->hasMany(Student::class);
    }

    public function courses(){
    	return $this->hasMany(Course::class);
    }

}
