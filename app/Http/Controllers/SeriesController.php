<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Models\{Course, Serie};

class SeriesController extends BaseController
{

   protected $rules = [
      'name'      => [ 'required' ],
      'course_id' => [ 'required' ],
   ];

   public function __construct()
   {
      $this->setTitle( 'Séries', 'Cadastros' );
      parent::__construct();
   }

   public function index( string $idCourse = null ){

      $courses = Course::orderBy('order')->get();

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

   public function store( Request $request ){

      $this->validate( $request, $this->rules );
      $this->createSerie( $request );

      $idCourse = $request->input('course_id');

      return Redirect::route('courses.series.index', array( 'idCourse' => $idCourse ))->with('message', 'Série cadastrada com sucesso!');

   }

   public function create( string $idCourse ){

      $serie  = new Serie();
      $course = Course::find($idCourse);

      return view('series.create')
               ->with( 'serie', $serie )
               ->with( 'idCourse', $idCourse )
               ->with( 'courseName', $course->name );

   }

   public function show(){
      return Redirect::to('series');
   }

   public function update( Request $request ){

      $this->validate( $request, $this->rules );

      // Saving serie!
      $this->updateSerie( $request );
      $idCourse = $request->input('course_id');

      return Redirect::route('courses.series.index', array( 'idCourse' => $idCourse ))->with('message', 'Serie atualizada com sucesso!');

   }

   public function destroy( string $idCourse, string $id ){

      if( isset($idCourse) && isset($id) ){

         $course = Course::find($idCourse);
         $course->series()->find($id)->delete();
         
         $this->updateOrders( $course );

      }else{
         abort(404);
      }

      return Redirect::route('courses.series.index', array( 'idCourse' => $idCourse ))->with('message', 'Série excluída com sucesso!');

   }

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

   public function getseries( String $idCourse = null ){

      if( $idCourse ){
         $series = Course::find($idCourse)->series()->get()->toArray();
      }else{
         $series = Serie::all()->toArray();
      }

      return response()->json( $series );

   }

   private function createSerie( Request $request ){

      $serie = new Serie();

      $this->putSerie( $serie, $request );

   }

   private function updateSerie( Request $request ){

      $id    = $request->input('id');
      $serie = Serie::find( $id );

      if( $serie ){
         $this->putSerie( $serie, $request );
      }


   }
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
