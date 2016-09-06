@extends('layouts.app')

@section('content')

<div class="row">

   <div class="col-xs-12">

      <div class="box">

         <div class="box-header">

            <h3 class="box-title">Cursos cadastrados</h3>

            <div class="pull-right">
               <a href="{{ url( action('CoursesController@create') ) }}" class="btn btn-primary">
                  <i class="fa fa-plus-circle"></i> Novo
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
                     <th width="80">Qtd. Séries</th>
                     <th width="160">Opções</th>
                  </tr>
               </thead>

               <tbody>
                  @foreach( $courses as $course )
                     <tr>
                        <td class="text-center"><span class="badge">{{ $course->order }}</span></td>
                        <td><a href="{{action('CoursesController@show', ['id' => $course->id])}}">{{ $course->name }}</a></td>
                        <td class="text-center">{{ $course->series->count() }}</td>
                        <td class="text-center">
                           <a href="{{ isset($first) && $course == $first ? '#' : action('CoursesController@reorder', ['id' => $course->id, 'direction' => 'u']) }}" {!! isset($first) && $course == $first ? 'disabled="true"' : ''  !!} class="btn btn-default"><i class="fa fa-arrow-up"></i></a>
                           <a href="{{ isset($last)  && $course == $last  ? '#' : action('CoursesController@reorder', ['id' => $course->id, 'direction' => 'd']) }}" {!! isset($last)  && $course == $last  ? 'disabled="true"' : ''  !!} class="btn btn-default"><i class="fa fa-arrow-down"></i></a>
                           <a href="{{ action('CoursesController@edit', ['id' => $course->id] ) }}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                           <button type="button" class="btn btn-danger btn_delete" data-value="{{ $course->id }}" data-toggle="modal" data-target="#removeModal" ><i class="fa fa-trash"></i></button>
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

   @include( 'partials._modal_delete', [ 'deleteMethod' => 'CoursesController@destroy', 'button_class' => 'btn_delete', 'entity' => ['o', 'curso'] ] )

   <script>
      $("#dt_courses").DataTable();
   </script>

@endsection
