@extends('layouts.app')

@section('content')

   {!!  Form::open( [ 'action' => 'SeriesController@store' ] ) !!}
      @include('series.partials._form', ['submit_text' => 'Criar'])
   {!! Form::close() !!}

@endsection
