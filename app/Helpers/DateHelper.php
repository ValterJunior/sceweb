<?php

namespace App\Helpers;

class DateHelper{

  /**
   * Returns a text in Brazilian portuguese with a full description text of a given date 
   *
   * @param  string idCourse
   * @param  string id
   * @return Illuminate\Http\Response
   */
	public static function getMonthText( $date ){
		
		$monthsPT_BR = ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'];

		return $monthsPT_BR[ $date->format('n') - 1 ];

	}

}