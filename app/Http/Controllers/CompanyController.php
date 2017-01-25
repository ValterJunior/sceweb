<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use App\Models\Company;

class CompanyController extends BaseController
{

   protected $rules = [
      'cnpj'               => [ 'required' ],
      'name'               => [ 'required' ],
      'address_name'       => [ 'required' ],
      'address_neighbor'   => [ 'required' ],
      'address_postalcode' => [ 'required' ],
      'address_city'       => [ 'required' ],
      'address_state'      => [ 'required' ],
      'phone_areacode'     => [ 'required' ],
      'phone_number'       => [ 'required' ],
      'email'              => [ 'required','email' ],
   ];

    public function __construct()
    {
      $this->setTitle( 'Instituição', 'Dashboard' );
      parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Company::get()->first();

        return view('company.index')->with( compact('company') );
    }


    /**
     * Update a resource in the DB.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $this->validate( $request, $this->rules );
        $this->saveCompany($request);

        return Redirect::to('dashboard');

    }

    /**
     * Persist the settings' info in the DB.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    private function saveCompany(Request $request)
    {

        $company = Company::first();

        if( Company::count() > 0 ){
            $company = Company::first();
        }else{
            $company = new Company();
        }

        $company->cnpj                 = $request->input('cnpj');
        $company->name                 = $request->input('name');
        $company->address_name         = $request->input('address_name');
        $company->address_number       = $request->input('address_number');
        $company->address_neighbor     = $request->input('address_neighbor');
        $company->address_postalcode   = $request->input('address_postalcode');
        $company->address_city         = $request->input('address_city');
        $company->address_state        = $request->input('address_state');
        $company->address_complement   = $request->input('address_complement');
        $company->phone_areacode       = $request->input('phone_areacode');
        $company->phone_number         = $request->input('phone_number');
        $company->email                = $request->input('email');
        $company->slogan               = $request->input('slogan');
        $company->logo                 = $request->input('logo');
        $company->operation_act_number = $request->input('operation_act_number');
        $company->ploy_date            = $request->input('ploy_date');

        $company->save();

    }

}
