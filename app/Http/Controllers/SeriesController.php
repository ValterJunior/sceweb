<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Models\{Course, Serie};

class SeriesController extends BaseController
{

   // Field rules
   protected $rules = [
      'name'      => [ 'required' ],
      'course_id' => [ 'required' ],
   ];

  /**
   * The class's constructor
   *
   */
   public function __construct()
   {
      $this->setTitle( 'Séries', 'Cadastros' );
      parent::__construct();
   }

  /**
   * The controller's main page
   *
   * @param  string idCourse
   * @return Illuminate\Http\Response
   */
   public function index( string $idCourse = null ){

      $courses = Course::orderBy('order')->get();

      if( !$courses ){
        abort(404); 
      }

      if( !isset($idCourse) ){
         return Redirect::route('courses.series.index', [ 'idCourse' => $courses->first()->id ] );
      }else{

         $series  = Serie::orderBy('order')->where( 'course_id', $idCourse )->get();
         $first   = $series->first();
         $last    = $series->last();

         return view('series.index')
                   ->with( compact('series') )
                   ->with( compact('courses') )
                   ->with( compact('idCourse') )
                   ->with( compact('first') )
                   ->with( compact('last') );
      }


   }

  /**
   * Method to save a new given serie
   *
   * @param  Illuminate\Http\Request
   * @return Illuminate\Http\Response
   */
   public function store( Request $request ){

      $this->validate( $request, $this->rules );
      $this->createSerie( $request );

      $idCourse = $request->input('course_id');

      return Redirect::route('courses.series.index', array( 'idCourse' => $idCourse ))->with('message', 'Série cadastrada com sucesso!');

   }

  /**
   * Returns a page responsible for creating a new serie to a given course
   *
   * @param  string idCourse
   * @return Illuminate\Http\Response
   */
   public function create( string $idCourse ){

      $serie  = new Serie();
      $course = Course::find($idCourse);

      return view('series.create')
               ->with( 'serie', $serie )
               ->with( 'idCourse', $idCourse )
               ->with( 'courseName', $course->name );

   }

  /**
   * Returns a page to show information of a given serie
   *
   * @return Illuminate\Http\Response
   */
   public function show(){
      return Redirect::to('series');
   }

  /**
   * Method to persist a given serie from a data request
   *
   * @param  Illuminate\Http\Request
   * @return Illuminate\Http\Response
   */
   public function update( Request $request ){

      $this->validate( $request, $this->rules );

      // Saving serie!
      $this->updateSerie( $request );
      $idCourse = $request->input('course_id');

      return Redirect::route('courses.series.index', array( 'idCourse' => $idCourse ))->with('message', 'Serie atualizada com sucesso!');

   }

  /**
   * Method to delete a given serie from a given course
   *
   * @param  string idCourse
   * @param  string id
   * @return Illuminate\Http\Response
   */
   public function destroy( string $idCourse, string $id ){

      if( isset($idCourse) && isset($id) ){

         $course = Course::find($idCourse);
         $course->series()->find($id)->delete();
         
         // Updating order of the serie's grid!
         $this->updateOrders( $course );

      }else{
         abort(404);
      }

      return Redirect::route('courses.series.index', array( 'idCourse' => $idCourse ))->with('message', 'Série excluída com sucesso!');

   }

  /**
   * Page responsible for editing information of a given serie from a given course
   *
   * @param  string idCourse
   * @param  string id
   * @return Illuminate\Http\Response
   */
   public function edit( string $idCourse, string $id ){

      $course     = Course::find($idCourse);
      $serie      = $course->series()->find($id);
      $courseName = $course->name;

      if( !$serie ){
         abort(404);
      }

      return view('series.edit')->with( compact('serie') )
                                ->with( compact('idCourse') )
                                ->with( compact('courseName'));

   }

  /**
   * Method to refresh the order of the serie's grid information
   *
   * @param  string idCourse
   * @param  string id
   * @param  string direction
   * @return Illuminate\Http\Response
   */
   public function reorder( string $idCourse, string $id, string $direction ){

      if( isset( $idCourse ) && isset( $id ) && isset( $direction ) ){

         $course      = Course::find($idCourse);
         $series      = $course->series()->orderBy('order')->get();
         $first       = $series->first();
         $last        = $series->last();
         $savedSerie  = null;

         // Direction = UP
         if( (strtolower( $direction ) == 'u') && ($first->id <> $id) ){

            foreach( $series as $serie ){

               if( $serie->id == $id ){

                  if( $savedSerie ){
                     $order             = $savedSerie->order;
                     $savedSerie->order = $serie->order;
                     $serie->order      = $order;
                     $serie->save();
                     $savedSerie->save();
                     break;
                  }

               }

               $savedSerie = $serie;

            }

         // Direction = Down
         } elseif ( (strtolower( $direction ) == 'd') && ($last->id <> $id) ) {

            foreach( $series as $serie ){

               if( $serie->id == $id ){
                  $savedSerie = $serie;
               }elseif( $savedSerie ){
                  $order             = $savedSerie->order;
                  $savedSerie->order = $serie->order;
                  $serie->order      = $order;
                  $serie->save();
                  $savedSerie->save();
                  break;
               }

            }

         }

      }

      return Redirect::route('courses.series.index', array( 'idCourse' => $idCourse ));

   }

  /**
   * Method to return a json with a list of all series in the database or
   * a series from a given course
   *
   * @param  string idCourse (optional)
   * @return JSON
   */
   public function getseries( String $idCourse = null ){

      if( $idCourse ){
         $series = Course::find($idCourse)->series()->get()->toArray();
      }else{
         $series = Serie::all()->toArray();
      }

      return response()->json( $series );

   }

  /**
   * Method responsible for managing the persist of a new given serie from a request data
   *
   * @param  Illuminate\Http\Request
   */
   private function createSerie( Request $request ){

      $serie = new Serie();

      $this->putSerie( $serie, $request );

   }

  /**
   * Method responsible for managing the update of a given serie from a request data
   *
   * @param  Illuminate\Http\Request
   */
   private function updateSerie( Request $request ){

      $id    = $request->input('id');
      $serie = Serie::find( $id );

      if( $serie ){
         $this->putSerie( $serie, $request );
      }


   }

  /**
   * Method responsible for persisting a given serie from a request data
   *
   * @param  App\Models\Serie
   * @param  Illuminate\Http\Request
   */
   private function putSerie( Serie $serie, Request $request ){

      $course_id = $request->input('course_id');

      if( $course_id ){

         $course       = Course::find($course_id);
         $serie->name  = $request->input( 'name' );

         // Just when it'snt in edit mode!
         if( !$serie->_id ){
            $serie->order = $course->series()->count() + 1;
         }

         $course->series()->save( $serie );
         
         $this->updateOrders( $course );

      }

   }

  /**
   * Method to persist the order of the serie's grid from a given course
   *
   * @param  App\Models\Course
   */
   private function updateOrders( Course $course ){

      $series = $course->series()->orderBy('order')->get();
      $cont   = 1;

      foreach( $series as $serie ){

         if( $serie->order <> $cont ){
            $serie->order = $cont;
            $serie->save();
         }

         $cont++;

      }

   }

}
