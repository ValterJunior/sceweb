<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class DataController extends Controller
{
    
  /**
   * Method to return a list of all the Brazilian states
   *
   * @return JSON
   */
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

  /**
   * Method to return a list of all cities from a given Brazilian state
   *
   * @param  string initials
   * @return JSON
   */
	public function getCities( String $initials ){

		$cities = $this->getCitiesList( $initials );

		return response()->json($cities);

	}

  /**
   * Method to retrieve information of all Brazilian states in an array!
   *
   * @return Array
   */
	private function getStatesList(){

		$json   = $this->getJson( 'states-cities' );
		$states = $json["estados"];

		if($states){
			return $states;
		}else{
			return [];
		}

	}

  /**
   * Method to retrieve information of all cities from a given Brazilian state in an array!
   *
   * @param  string initials
   * @return array
   */
	private function getCitiesList( String $initials ){

		$states = $this->getStatesList();

		foreach( $states as $state ){

			if( strtoupper($state['sigla']) === strtoupper($initials) ){
				return $state['cidades'];
			}

		}

	}

  /**
   * Method to read a json file and transform in an array of string
   *
   * @param  string fileName
   * @return array
   */
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
