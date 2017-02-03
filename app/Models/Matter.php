<?php

namespace App\Models;

use App\Models\BaseCompanyModel;

class Matter extends BaseCompanyModel
{
 
	public function serie(){
		return $this->belongsTo(Serie::class);
	}

}
