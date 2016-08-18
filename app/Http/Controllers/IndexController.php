<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use Auth;

class IndexController extends Controller
{

   public function index(){

         if( Auth::guest() ){
            return Redirect::to('/login');
         }else{
            return view('home.index');
         }


   }

}
