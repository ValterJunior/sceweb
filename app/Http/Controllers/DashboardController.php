<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class DashboardController extends BaseController
{
   public function __construct()
   {

      $this->setTitle( 'Dashboard' );

      parent::__construct();

   }

    public function index(){
      return view('dashboard.index');
   }

}
