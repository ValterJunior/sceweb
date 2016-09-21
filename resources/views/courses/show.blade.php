@extends('layouts.app')

@section('content')

   <div class="row">
      <div class="col-lg-12" style="margin-bottom: 10px;">
         <a href="{{ action('CoursesController@edit', ['id' => $course->id] ) }}" class="btn btn-warning"><i class="fa fa-edit"></i> Editar</a>
         <a href="{{ action('CoursesController@index') }}" class="btn btn-default"><i class="fa fa-reply"></i> Voltar</a>
      </div>
   </div>

   <div class="row">

      <div class="col-md-12">

         <div class="box box-primary">

            <div class="box-header with-border">
               <h3 class="box-title">Dados Gerais</h3>
            </div>

            <div class="box-body">

               <div class="row">
                  <div class="col-lg-12">
                     <label class="col-sm-2">Nome</label>
                     <div class="col-sm-10">
                           <p>{{ $course->name }}</p>
                     </div>
                  </div>
               </div>

            </div>

         </div>

         <div class="box box-primary">

            <div class="box-header with-border">
               <h3 class="box-title">Séries</h3>
            </div>

            <div class="box-body">

               <div class="row">

                  <div class="col-lg-12">

                     @if( $course->series->count() == 0 )
                        <br/>
                        <p>Ainda não há série cadastrada para este curso. Cadastre a primeira <a href="{{ action('SeriesController@index') }}">aqui</a>.</p>
                     @else

                        <table class="table table-condensed">

                           <tbody>
                              <tr>
                                 <th style="width: 30px">Ordem</th>
                                 <th>Nome</th>
                              </tr>

                              @foreach( $course->series as $serie )
                                 <tr>
                                    <td class="text-center"><span class="badge">{{ $serie->order }}</span></td>
                                    <td>{{ $serie->name }}</td>
                                 </tr>
                              @endforeach

                           </tbody>

                        </table>

                     @endif

                  </div>

               </div>

            </div>

         </div>

      </div>

   </div>
@endsection
