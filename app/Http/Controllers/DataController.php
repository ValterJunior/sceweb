<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class DataController extends Controller
{
    
	public function getStates(){

		$states = $this->getStatesList();
		$result = [];
		$initials = Input::get("term");
		foreach( $states as $state ){
			if( strpos( strtolower($state['nome']), strtolower($initials) ) !== false ){
				$result[] = [ 'initials' => $state['sigla'], 'name' => $state['nome'] ];
			}
		}

		return response()->json($result);

	}

	public function getCities( String $initials ){

		$cities = $this->getCitiesList( $initials );

		return response()->json($cities);

	}

	private function getStatesList(){

		$json   = $this->getJson( 'states-cities' );
		$states = $json["estados"];

		if($states){
			return $states;
		}else{
			return [];
		}

	}

	private function getCitiesList( String $initials ){

		$states = $this->getStatesList();

		foreach( $states as $state ){

			if( strtoupper($state['sigla']) === strtoupper($initials) ){
				return $state['cidades'];
			}

		}

	}

	private function getJson( String $filename ){

		$path = storage_path() . "/data/${filename}.json";
		$json = json_decode(file_get_contents($path), true); 

		if($json){
			return $json;
		}else{
			return [];
		}

	}

}
