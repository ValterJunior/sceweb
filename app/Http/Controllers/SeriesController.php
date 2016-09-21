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
         return Redirect::route('courses.series.index', array( 'idCourse' => $courses->first()->id ) );
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

      $serie = $this->createSerie( $request );

      return Redirect::to('series')->with('message', 'Série cadastrada com sucesso!');

   }

   public function create(){

      $courses = Course::orderBy('order')->get();

      return view('series.create')->with( compact('courses') );

   }

   public function show(){
      return Redirect::to('series');
   }

   public function update( Request $request ){

      $this->validate( $request, $this->rules );

      // Saving course!
      $course = $this->updateSerie( $request );

      return Redirect::to('series')->with('message', 'Serie atualizada com sucesso!');

   }

   public function destroy( string $id ){

      if( isset($id) ){
         Serie::find($id)->delete();
         $this->updateOrders();
      }else{
         abort(404);
      }

      return Redirect::to('series')->with('message', 'Série excluída com sucesso!');

   }

   public function edit( string $id ){

      $serie   = Serie::find($id);
      $courses = Course::orderBy('order')->get();

      if( !$serie ){
         abort(404);
      }

      return view('series.edit')->with( compact('serie') )
                                ->with( compact('courses') );

   }

   public function reorder( string $id, string $direction ){

      if( isset( $id ) && isset( $direction ) ){

         $series      =  Serie::orderBy('order')->get();
         $first       = $series->first();
         $last        = $series->last();
         $savedSerie  = null;

         // Direction = UP
         if( (strtolower( $direction ) == 'u') && ($first->id <> $id) ){

            foreach( $series as $serie ){

               if( $serie->id == $id ){

                  if( $savedSerie ){
                     $order              = $savedSerie->order;
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
               }elseif( $savedCourse ){
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

      return Redirect::to('series');

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

      $course_id    = $request->input('course_id');
      $serie->name  = $request->input( 'name' );
      $serie->order = Serie::count() + 1;

      if( $course_id ){
         $course = Course::find($course_id);
         $course->series()->save( $serie );
         $this->updateOrders();
      }

   }

   private function updateOrders(){

      $series = Serie::orderBy('order')->get();
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
