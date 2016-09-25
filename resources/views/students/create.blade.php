@extends('layouts.app')

@section('content')

   {!!  Form::open( [ 'action' => 'StudentsController@store' ] ) !!}
      @include('students.partials._form', [ 'submit_text' => 'Criar'])
   {!! Form::close() !!}

@endsection
