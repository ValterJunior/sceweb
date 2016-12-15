<?php

namespace App\Helpers;

class DateHelper{

	public static function getMonthText( $date ){
		
		$monthsPT_BR = ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'];

		return $monthsPT_BR[ $date->format('n') - 1 ];

	}

}