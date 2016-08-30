@extends('layouts.app')

@section('content')

   {!!  Form::open( [ 'action' => 'CoursesController@store' ] ) !!}
      @include('courses.partials._form', ['submit_text' => 'Criar'])
   {!! Form::close() !!}

@endsection
