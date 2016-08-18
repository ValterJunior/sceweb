@extends('layouts.app')

@section('content')

   {!!  Form::open( [ 'method' => 'PUT', 'action' => ['StudentsController@update', $student->_id] ] ) !!}
      @include('students.partials._form', ['submit_text' => 'Salvar'])
   {!! Form::close() !!}

@endsection
