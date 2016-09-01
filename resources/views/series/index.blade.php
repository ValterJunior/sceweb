@extends('layouts.app')

@section('content')

<div class="row">

   <div class="col-xs-12">

      <div class="box">

         <div class="box-header">

            <h3 class="box-title">Séries cadastradas</h3>

            <div class="pull-right">
               <a href="{{ url( action('SeriesController@create') ) }}" class="btn btn-primary">
                  <i class="fa fa-plus-circle"></i> Nova
               </a>
            </div>

         </div>

         <!-- /.box-header -->
         <div class="box-body">

            <table id="dt_courses" class="table table-bordered table-striped">

               <thead>
                  <tr>
                     <th width="20">Ordem</th>
                     <th>Nome</th>
                     <th>Curso</th>
                     <th width="160">Opções</th>
                  </tr>
               </thead>

               <tbody>
                  @foreach( $series as $serie )
                     <tr>
                        <td class="text-center"><span class="badge">{{ $serie->order }}</span></td>
                        <td>{{ $serie->name }}</td>
                        <td>{{ $serie->course->name }}</td>
                        <td class="text-center">
                           <a href="{{ isset($first) && $serie == $first ? '#' : action('SeriesController@reorder', ['id' => $serie->id, 'direction' => 'u']) }}" {!! isset($first) && $serie == $first ? 'disabled="true"' : ''  !!} class="btn btn-default"><i class="fa fa-arrow-up"></i></a>
                           <a href="{{ isset($last)  && $serie == $last  ? '#' : action('SeriesController@reorder', ['id' => $serie->id, 'direction' => 'd']) }}" {!! isset($last)  && $serie == $last  ? 'disabled="true"' : ''  !!} class="btn btn-default"><i class="fa fa-arrow-down"></i></a>
                           <a href="{{ action('SeriesController@edit'   , ['id' => $serie->id] ) }}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                           <button type="button" class="btn btn-danger btn_delete" data-value="{{ $serie->id }}" data-toggle="modal" data-target="#removeModal" ><i class="fa fa-trash"></i></button>
                        </td>
                     </tr>
                  @endforeach
               </tbody>

            </table>

         </div>
         <!-- /.box-body -->

      </div>
      <!-- /.box -->

   </div>
   <!-- /.col -->

</div>
<!-- /.row -->

@endsection

@section('extra_scripts')

   @include( 'partials._modal_delete', [ 'deleteMethod' => 'SeriesController@destroy', 'button_class' => 'btn_delete', 'entity' => ['a', 'série'] ] )

   <script>
      $("#dt_courses").DataTable();
   </script>

@endsection
