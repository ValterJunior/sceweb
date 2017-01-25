<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\{Student, Course, Serie};

class DashboardController extends BaseController
{

  /**
   * The class's constructor
   *
   */
   public function __construct()
   {

      $this->setTitle( 'Dashboard' );

      parent::__construct();

   }

  /**
   * The controller's main page
   *
   * @return Illuminate\Http\Response
   */
    public function index(){

    	$studentsCount = Student::count();
    	$coursesCount  = Course::count();
    	$seriesCount   = Serie::count();


      return view('dashboard.index')
      			->with( compact("studentsCount") )
      			->with( compact("coursesCount") )
      			->with( compact("seriesCount") );
   }

}
