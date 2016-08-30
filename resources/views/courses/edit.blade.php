@extends('layouts.app')

@section('content')

   {!!  Form::open( [ 'method' => 'PUT', 'action' => ['CoursesController@update', $course->_id] ] ) !!}
      @include('courses.partials._form', ['submit_text' => 'Salvar'])
   {!! Form::close() !!}

@endsection
