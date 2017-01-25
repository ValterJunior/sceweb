@extends('layouts.app')

@section('content')

   <!-- Small boxes (Stat box) -->
   <div class="row">
      <div class="col-lg-3 col-xs-6">
         <!-- small box -->
         <div class="small-box bg-aqua">
            <div class="inner">
               <h3>{{ $studentsCount }}</h3>

               <p>Alunos</p>
            </div>
            <div class="icon">
               <i class="fa fa-users"></i>
            </div>
            <a href="{{ route('students.index') }}" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
         </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
         <!-- small box -->
         <div class="small-box bg-green">
            <div class="inner">
               <h3>{{ $coursesCount }}</h3>

               <p>Cursos</p>
            </div>
            <div class="icon">
               <i class="fa fa-graduation-cap"></i>
            </div>
            <a href="{{ route('courses.index') }}" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
         </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
         <!-- small box -->
         <div class="small-box bg-yellow">
            <div class="inner">
               <h3>{{ $seriesCount }}</h3>

               <p>Séries</p>
            </div>
            <div class="icon">
               <i class="fa fa-sitemap"></i>
            </div>
            <a href="{{ url(action('SeriesController@index')) }}" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
         </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
         <!-- small box -->
         <div class="small-box bg-red">
            <div class="inner">
               <h3>0</h3>

               <p>Matérias</p>
            </div>
            <div class="icon">
               <i class="fa fa-tags"></i>
            </div>
            <a href="#" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
         </div>
      </div>
      <!-- ./col -->
   </div>
   <!-- /.row -->

@endsection
