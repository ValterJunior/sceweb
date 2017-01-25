<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use View;

class BaseController extends Controller
{

   protected $menuTitle;
   protected $groupTitle;

    /**
     * The class' constructor
     *
     */
   public function __construct()
   {
       // Setting the common information that is showed in all pages under the main layout!
       View::share ( '_menuTitle' , $this->menuTitle );
       View::share ( '_groupTitle', $this->groupTitle );
   }

    /**
     * Mandatory information for all pages under the main layout!
     *
     * @param  string title
     * @param  string group
     */
   protected function setTitle( string $title, string $group = 'Home' ){

      $this->menuTitle  = $title;
      $this->groupTitle = $group;

   }

}
