<?php

namespace App\Helpers;

class StringHelper{

  /**
   * Method to captalize the first letter of each word in a text
   *
   * @param  string text
   * @return String
   */
	public static function captalizeEachWord( $text ){

		$words    = explode( ' ', $text );
		$newWords = array();

		foreach( $words as $word ){
			$newWords[] = ucfirst(strtolower($word));
		}

		return implode( ' ', $newWords );

	}

}