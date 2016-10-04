<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Models\{Student, Course, Serie};
use App\Library\Utils;

class StudentsController extends BaseController
{

   protected $rules = [
      'enrollment_number' => [ 'required' ],
      'name'              => [ 'required' ],
      'address_name'      => [ 'required' ],
      'address_number'    => [ 'required' ],
      'address_neighbor'  => [ 'required' ],
      'address_city'      => [ 'required' ],
      'serie_id'          => [ 'required' ],
   ];

   public function __construct()
   {
      $this->setTitle( 'Alunos', 'Cadastros' );
      parent::__construct();
   }

   public function index(){

      $students = Student::orderBy('enrollment_number')->get();

      return view('students.index')->with('students', $students);

   }

   public function store( Request $request ){

      $this->validate( $request, $this->rules );
      $this->createStudent( $request );

      return Redirect::to('students')->with('message', 'Aluno cadastrado com sucesso!');

   }

   public function create(){

      $student = new Student();
      $courses = Course::orderBy('order')->get();

      return view('students.create')
               ->with( 'student', $student )
               ->with( 'courses', $courses );

   }

   public function show(){

   }

   public function update( Request $request ){

      $this->validate( $request, $this->rules );
      $this->updateStudent( $request );

      return Redirect::to('students')->with('message', 'Aluno atualizado com sucesso!');

   }

   public function destroy( string $id ){

      if( isset($id) ){

         $student = Student::find( $id );

         if( $student ){
            $student->delete();
         }

      }else{
         abort(404);
      }

      return Redirect::to('students')->with('message', 'Aluno excluído com sucesso!');

   }

   public function edit( string $id ){

      $courses = Course::orderBy('order')->get();
      $student = Student::find($id);

      return view('students.edit')
               ->with( 'student', $student )
               ->with( 'courses', $courses );

   }

   private function createStudent( Request $request ){

      $student = new Student();

      $this->putStudent( $student, $request );

   }

   private function updateStudent( Request $request ){

      $id      = $request->input('id');
      $student = Student::find( $id );

      if( isset( $student ) ){
         $this->putStudent( $student, $request );
      }

      return Redirect::to('students')->with('message', 'Aluno atualizado com sucesso!');

   }
   private function putStudent( Student $student, Request $request ){

      $student->enrollment_number = $request->input( 'enrollment_number'              );
      $student->name              = Utils::utf8UpperCase( $request->input( 'name'             ) );
      $student->birth_date        = $request->input( 'birth_date'                     );
      $student->gender            = $request->input( 'gender'                         );
      $student->father_name       = Utils::utf8UpperCase( $request->input( 'father_name'      ) );
      $student->mother_name       = Utils::utf8UpperCase( $request->input( 'mother_name'      ) );
      $student->address_name      = Utils::utf8UpperCase( $request->input( 'address_name'     ) );
      $student->address_number    = Utils::utf8UpperCase( $request->input( 'address_number'   ) );
      $student->address_neighbor  = Utils::utf8UpperCase( $request->input( 'address_neighbor' ) );
      $student->address_city      = Utils::utf8UpperCase( $request->input( 'address_city'     ) );
      $student->address_state     = $request->input( 'address_state'                  );
      $student->phone_number      = $request->input( 'phone_number'                   );
      $student->discount          = $request->input( 'discount'                       );
      $student->serie_id          = $request->input( 'serie_id'                       );

      $student->save();

   }

}
