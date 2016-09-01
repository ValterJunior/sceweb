<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Models\{Course, Serie};

class CoursesController extends BaseController
{

   protected $rules = [
      'name' => [ 'required' ]
   ];

   public function __construct()
   {
      $this->setTitle( 'Cursos', 'Cadastros' );
      parent::__construct();
   }

   public function index(){

      $courses = Course::orderBy('order')->get();
      $first   = $courses->first();
      $last    = $courses->last();

      return view('courses.index')
                ->with( compact('courses') )
                ->with( compact('first') )
                ->with( compact('last') );

   }

   public function store( Request $request ){

      $this->validate( $request, $this->rules );

      $course = $this->createCourse( $request );

      return Redirect::to('courses')->with('message', 'Curso cadastrado com sucesso!');

   }

   public function create(){
      return view('courses.create');
   }

   public function show(){
      return Redirect::to('courses');
   }

   public function update( Request $request ){

      $this->validate( $request, $this->rules );

      // Saving course!
      $course = $this->updateCourse( $request );

      return Redirect::to('courses')->with('message', 'Curso atualizado com sucesso!');

   }

   public function destroy( string $id ){

      if( isset($id) ){
         Course::find($id)->delete();
         $this->updateOrders();
      }else{
         abort(404);
      }

      return Redirect::to('courses')->with('message', 'Curso excluído com sucesso!');

   }

   public function edit( string $id ){

      $course = Course::find($id);

      if( !$course ){
         abort(404);
      }

      return view('courses.edit')->with( compact('course') );

   }

   public function reorder( string $id, string $direction ){

      if( isset( $id ) && isset( $direction ) ){

         $courses     =  Course::orderBy('order')->get();
         $first       = $courses->first();
         $last        = $courses->last();
         $savedCourse = null;

         // Direction = UP
         if( (strtolower( $direction ) == 'u') && ($first->id <> $id) ){

            foreach( $courses as $course ){

               if( $course->id == $id ){

                  if( $savedCourse ){
                     $order              = $savedCourse->order;
                     $savedCourse->order = $course->order;
                     $course->order      = $order;
                     $course->save();
                     $savedCourse->save();
                     break;
                  }

               }

               $savedCourse = $course;

            }

         // Direction = Down
         } elseif ( (strtolower( $direction ) == 'd') && ($last->id <> $id) ) {

            foreach( $courses as $course ){

               if( $course->id == $id ){
                  $savedCourse = $course;
               }elseif( $savedCourse ){
                  $order              = $savedCourse->order;
                  $savedCourse->order = $course->order;
                  $course->order      = $order;
                  $course->save();
                  $savedCourse->save();
                  break;
               }

            }

         }

      }

      return Redirect::to('courses');

   }

   private function createCourse( Request $request ){

      $course = new Course();

      $this->putCourse( $course, $request );

   }

   private function updateCourse( Request $request ){

      $id     = $request->input('id');
      $course = Course::find( $id );

      if( isset( $course ) ){
         $this->putCourse( $course, $request );
      }


   }
   private function putCourse( Course $course, Request $request ){

      $course->name = $request->input( 'name' );
      $course->order = Course::count() + 1;
      $course->save();

      $this->updateOrders();

   }

   private function updateOrders(){

      $courses = Course::orderBy('order')->get();
      $cont    = 1;

      foreach( $courses as $course ){

         if( $course->order <> $cont ){
            $course->order = $cont;
            $course->save();
         }

         $cont++;

      }

   }

}
