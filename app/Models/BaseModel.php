<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Moloquent;

class BaseModel extends Moloquent
{
    
	public function scopeRandom($query){

		$collection = $this::all();

		if(!$collection->isEmpty()){
			return $collection->random(1)->first();
		}else{
			return null;
		}

	}

}
