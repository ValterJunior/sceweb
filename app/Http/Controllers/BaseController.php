<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use View;

class BaseController extends Controller
{

   protected $menuTitle;
   protected $groupTitle;

   public function __construct()
   {
       View::share ( '_menuTitle' , $this->menuTitle );
       View::share ( '_groupTitle', $this->groupTitle );
   }

   protected function setTitle( string $title, string $group = 'Home' ){

      $this->menuTitle  = $title;
      $this->groupTitle = $group;

   }

}
