<?php

namespace App\Helpers;

class StringHelper{

	public static function captalizeEachWord( $text ){

		$words    = explode( ' ', $text );
		$newWords = array();

		foreach( $words as $word ){
			$newWords[] = ucfirst(strtolower($word));
		}

		return implode( ' ', $newWords );

	}

}