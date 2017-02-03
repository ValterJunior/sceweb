<?php

namespace App\Models;

use App\Models\BaseModel;

class Serie extends BaseModel
{
	protected $fillable = [
	  'name',
	  'course_id',
	  'order'
	];

	public function course(){
	  return $this->belongsTo(Course::class);
	}

	public function students(){
		return $this->hasMany(Student::class);
	}

	public function matters(){
		return $this->hasMany(Matter::class);
	}

}
