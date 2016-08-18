@extends('layouts.app')

@section('content')

<div class="row">

   <div class="col-xs-12">

      <div class="box">

         <div class="box-header">

            <h3 class="box-title">Alunos</h3>

            <div class="pull-right">
               <a href="{{ url( action('StudentsController@create') ) }}" class="btn btn-primary">
                  <i class="fa fa-plus-circle"></i> Novo
               </a>
            </div>

         </div>

         <!-- /.box-header -->
         <div class="box-body">

            <table id="dt_students" class="table table-bordered table-striped">

               <thead>
                  <tr>
                     <th>Matrícula</th>
                     <th>Nome</th>
                     <th>Curso</th>
                     <th>Série</th>
                     <th>Opções</th>
                  </tr>
               </thead>

               <tbody>
                  <!-- <% @alunos.each do |aluno| %>
                  <tr>
                     <td><%= aluno.matricula %></td>
                     <td><%= aluno.nome %></td>
                     <td> <%= aluno.curso.nome %> </td>
                     <td> <%= aluno.serie.nome %> </td>
                     <td width="120">
                        <a href="#" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                        <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                     </td>
                  </tr>
                  <% end %> -->
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

   <script>
      $("#dt_students").DataTable();
   </script>

@endsection