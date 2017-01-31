<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Models\{Course, Serie};
use Auth;

class CoursesController extends BaseController
{

   // Field rules
   protected $rules = [
      'name' => [ 'required' ]
   ];

   /**
   * The class' constructor
   *
   */
   public function __construct()
   {
      $this->setTitle( 'Cursos', 'Cadastros' );
      parent::__construct();
   }

    /**
     * The controller's main page
     *
     * @return Illuminate\Http\Response
     */
   public function index(){

      $courses = Course::orderBy('order')->get();
      $first   = $courses->first();
      $last    = $courses->last();

      return view('courses.index')
                ->with( compact('courses') )
                ->with( compact('first') )
                ->with( compact('last') );

   }

   /**
   * Method to save a new course!
   *
   * @param  Illuminate\Http\Request
   * @return Illuminate\Http\Response
   */
   public function store( Request $request ){

      $this->validate( $request, $this->rules );

      $course = $this->createCourse( $request );

      return Redirect::to('courses')->with('message', 'Curso cadastrado com sucesso!');

   }

   /**
   * The controller's page to set a new course!
   *
   * @return Illuminate\Http\Response
   */
   public function create(){
      return view('courses.create');
   }

   /**
   * The controller's page to show information about a persisted course
   *
   * @return Illuminate\Http\Response
   */
   public function show( string $id ){

      $course = Course::find( $id );

      return view( 'courses.show' )->with( compact('course') );
   }

   /**
   * Method to update a given course!
   *
   * @param  Illuminate\Http\Request
   * @return Illuminate\Http\Response
   */
   public function update( Request $request ){

      $this->validate( $request, $this->rules );

      // Saving course!
      $course = $this->updateCourse( $request );

      return Redirect::to('courses')->with('message', 'Curso atualizado com sucesso!');

   }

   /**
   * Method to delete a given course
   *
   * @param  string id
   * @return Illuminate\Http\Response
   */
   public function destroy( string $id ){

      if( isset($id) ){
         Course::find($id)->delete();
         $this->updateOrders();
      }else{
         abort(404);
      }

      return Redirect::to('courses')->with('message', 'Curso excluído com sucesso!');

   }

   /**
   * The controller's page to update a given course
   *
   * @param  string id
   * @return Illuminate\Http\Response
   */
   public function edit( string $id ){

      $course = Course::find($id);

      if( !$course ){
         abort(404);
      }

      return view('courses.edit')->with( compact('course') );

   }

   /**
   * Method to refresh the grid's query order!
   *
   * @param  string id
   * @param  string direction (up/down)
   * @return Illuminate\Http\Response
   */
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

   /**
   * Method to persist a new created course from request data
   *
   * @param  Illuminate\Http\Request
   */
   private function createCourse( Request $request ){

      $course = new Course();

      $this->putCourse( $course, $request );

   }

   /**
   * Method to persist a course from request data
   *
   * @param  Illuminate\Http\Request
   * @return Illuminate\Http\Response
   */
   private function updateCourse( Request $request ){

      $id     = $request->input('id');
      $course = Course::find( $id );

      if( isset( $course ) ){
         $this->putCourse( $course, $request );
      }


   }

   /**
   * Method to persist the given course into the database
   *
   * @param  App\Models\Course
   * @param  Illuminate\Http\Request
   * @return Illuminate\Http\Response
   */
   private function putCourse( Course $course, Request $request ){

      $course->name = $request->input( 'name' );
      $course->order = Course::count() + 1;
      $course->company_id = Auth::user()->company_id;
      $course->save();

      $this->updateOrders();

   }

   /**
   * Method to persist the calculated order into the database!
   *
   */
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
