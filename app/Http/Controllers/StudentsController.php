<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Models\{Student, Course, Serie};

class StudentsController extends BaseController
{

   protected $rules = [
      'enrollment_number' => [ 'required' ],
      'name'              => [ 'required' ],
      'address_name'      => [ 'required' ],
      'address_number'    => [ 'required' ],
      'address_neighbor'  => [ 'required' ],
      'address_city'      => [ 'required' ],
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

      $student = $this->createStudent( $request );

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

   public function update(){

   }

   public function destroy(){

   }

   public function edit(){

      $courses = Course::orderBy('order')->get();

      return view('students.edit')
               ->with( compact($courses) );

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


   }
   private function putStudent( Student $student, Request $request ){

      $student->enrollment_number = $request->input( 'enrollment_number' );
      $student->name              = $request->input( 'name'              );
      $student->birth_date        = $request->input( 'birth_date'        );
      $student->gender            = $request->input( 'gender'            );
      $student->father_name       = $request->input( 'father_name'       );
      $student->mother_name       = $request->input( 'mother_name'       );
      $student->address_name      = $request->input( 'address_name'      );
      $student->address_number    = $request->input( 'address_number'    );
      $student->address_neighbor  = $request->input( 'address_neighbor'  );
      $student->address_city      = $request->input( 'address_city'      );
      $student->address_state     = $request->input( 'address_state'     );
      $student->phone_number      = $request->input( 'phone_number'      );
      $student->discount          = $request->input( 'discount'          );

      $student->save();

   }

}
