@extends('layouts.app')

@section('content')

   {!!  Form::open( [ 'method' => 'PUT', 'action' => ['SeriesController@update', $serie->_id] ] ) !!}
      @include('series.partials._form', ['submit_text' => 'Salvar'])
   {!! Form::close() !!}

@endsection
