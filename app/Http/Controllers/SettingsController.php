<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use App\Models\Settings;
use Auth;

class SettingsController extends BaseController
{

   // Fields required 
   protected $rules = [
      'manager_cpf'           => [ 'required' ],
      'manager_name'          => [ 'required' ],
      'manager_occupation'    => [ 'required' ],
      'manager_email'         => [ 'email'    ],
      'secretary_name'        => [ 'required' ],
      'bankslip_value'        => [ 'min:1'    ],
      'bankslip_paymentplace' => [ 'required' ],
   ];

  /**
   * The class's constructor
   *
   */
    public function __construct()
    {
      $this->setTitle( 'Configurações', 'Dashboard' );
      parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $settings = Settings::where("company_id", Auth::user()->company_id)->first();

        if( !$settings ){
            abort(404);
        }

        return view('settings.index')->with( compact("settings") );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $this->validate( $request, $this->rules );
        $this->saveSettings($request);

        return Redirect::to('dashboard');
    }

    /**
     * Persist the settings' info in the DB.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    private function saveSettings( Request $request ){

        $settings = Settings::find( $request->input("id") );

        if(!$settings){
            abort(404);
        }

        $settings->manager_cpf           = $request->input("manager_cpf");
        $settings->manager_name          = $request->input("manager_name");
        $settings->manager_occupation    = $request->input("manager_occupation");
        $settings->manager_email         = $request->input("manager_email");
        $settings->secretary_name        = $request->input("secretary_name");
        $settings->bankslip_value        = $request->input("bankslip_value");
        $settings->bankslip_fine         = $request->input("bankslip_fine");
        $settings->bankslip_interest     = $request->input("bankslip_interest");
        $settings->bankslip_paymentplace = $request->input("bankslip_paymentplace");
        $settings->bankslip_observations = $request->input("bankslip_observations");

        $settings->save();
    }


}
