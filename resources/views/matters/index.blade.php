@extends('layouts.app')

@section('content')

   <div class="row">

      <div class="col-md-12">

         <div class="box">

            <!-- /.box-header -->
            <div class="box-body">

               <div class="col-md-2">

                  <div class="form-group">

                     <label for="course_id">Curso</label>
                     <select name="course_id" id="course_id" class="form-control select2">
                        @foreach( $courses as $course )
                           <option value="{{ $course->id }}" {{ $course->id == $idCourse ? "selected" : "" }} >{{ $course->name }}</option>
                        @endforeach
                     </select>

                  </div>

               </div>

               <div class="col-md-4">

                  <div class="form-group">

                     <label for="matter_id">Série</label>
                     <select name="matter_id" id="matter_id" class="form-control select2"></select>

                  </div>

               </div>

            </div>

         </div>

      </div>

   </div>

   <div class="row">

      <div class="col-md-12">

         <div class="box">

            <div class="box-header">

               <h3 class="box-title">Matérias cadastradas</h3>

               <div class="pull-right">
                  <a href="{{ url( action('MattersController@create', ['idCourse' => $idCourse, 'idmatter' => $idmatter]) ) }}" class="btn btn-primary">
                     <i class="fa fa-plus-circle"></i> Nova
                  </a>
               </div>

            </div>

            <!-- /.box-header -->
            <div class="box-body">

               <table id="dt_matters" class="table table-bordered table-striped">

                  <thead>
                     <tr>
                        <th>Nome</th>
                        <th>Categoria</th>
                        <th width="160">Opções</th>
                     </tr>
                  </thead>

                  <tbody>
                     @foreach( $matters as $matter )
                        <tr>
                           <td class="text-center"><span class="badge">{{ $matter->order }}</span></td>
                           <td>{{ $matter->name }}</td>
                           <td>{{ $matter->category == 'BN' ? 'Base normal' : 'Parte diversificada' }}
                           <td class="text-center">
                              <a href="{{ action('MattersController@edit', [ 'idCourse' => $idCourse, 'idSerie' => $idSerie, 'id' => $matter->id] ) }}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                              <button type="button" class="btn btn-danger btn_delete" data-value="{{ $matter->id }}" data-toggle="modal" data-target="#removeModal" ><i class="fa fa-trash"></i></button>
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

   @include( 'partials._modal_delete', [ 'deleteMethod' => route( 'courses.matters.destroy', [ 'p1' => $idCourse, 'p2' => '_0_' ] ), 'button_class' => 'btn_delete', 'entity' => ['esta', 'série'] ] )

   <script>

      $("#dt_courses").DataTable();
      $('#course_id').select2();

      $('#course_id').on("change", function(e){

         window.location = String.format( "{{ route('courses.matters.index', ['idCourse' => '_0_']) }}", $(this).val() );
         
      });

   </script>

@endsection
