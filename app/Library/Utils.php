<?php

namespace App\Library;

class Utils
{

	public static function utf8UpperCase( string $text ){
		return mb_convert_case( $text, MB_CASE_UPPER, 'UTF-8');
	}

}
