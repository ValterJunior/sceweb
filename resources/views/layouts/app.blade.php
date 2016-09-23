@extends('layouts.main')

@section('extra_head')
   <link rel="stylesheet" href="/plugins/datatables/dataTables.bootstrap.css">
@endsection

@section('body_content')

<body class="hold-transition skin-blue sidebar-mini">

   <div class="wrapper">

      <header class="main-header">
         <!-- Logo -->
         <a href="index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>SCE</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>SCE</b>Web</span>
         </a>
         <!-- Header Navbar: style can be found in header.less -->
         <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
               <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
               <ul class="nav navbar-nav">
                  <li class="dropdown user user-menu">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="/img/user2-160x160.jpg" alt="User Image" class="user-image"></img>
                        <span class="hidden-xs">{{ Auth::user()->name }}</span>
                     </a>
                     <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                           <img src="/img/user2-160x160.jpg" alt="User Image" class="user-image"></img>

                           <p>
                              {{ Auth::user()->name }}
                              <small>Membro desde Julho de 2016.</small>
                           </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                           <!-- /.row -->
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                           <div class="pull-right">
                              <a href="{{ url('/logout') }}" class="btn btn-default btn-flat"> Sair</a>
                           </div>
                        </li>
                     </ul>
                  </li>
                  <!-- Control Sidebar Toggle Button -->
                  <li>
                     <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                  </li>
               </ul>
            </div>
         </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
         <!-- sidebar: style can be found in sidebar.less -->
         <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
               <div class="pull-left image">
                  <img src="/img/user2-160x160.jpg" alt="User Image" class="img-circle"></img>
               </div>
               <div class="pull-left info">
                  <p>{{ Auth::user()->name }}</p>
                  <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
               </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
               <div class="input-group">
                  <input type="text" name="q" class="form-control" placeholder="Pesquisar...">
                  <span class="input-group-btn">
                     <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                     </button>
                  </span>
               </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
               <li class="header">Menu de opções</li>
               <li>
                  <a href="{{ url( action('DashboardController@index') ) }}">
                     <i class="fa fa-home"></i> <span>Dashboard</span>
                  </a>
               </li>
               <li class="treeview">
                  <a href="#">
                     <i class="fa fa-files-o"></i><span>Cadastros</span>
                     <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                     </span>
                  </a>
                  <ul class="treeview-menu">
                     <li data-item="students"><a href="{{ url('students') }}"><i class="fa fa-users"></i> Alunos</a></li>
                     <li data-item="courses"><a href="{{ url('courses') }}"><i class="fa fa-graduation-cap"></i> Cursos</a></li>
                     <li data-item="series"><a href="{{ url('series') }}"><i class="fa fa-sitemap"></i> Séries</a></li>
                     <li data-item=""><a href="#"><i class="fa fa-tags"></i> Matérias</a></li>
                  </ul>
               </li>
               <li class="treeview">
                  <a href="#">
                     <i class="fa fa-pie-chart"></i><span>Gerenciais</span>
                     <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                     </span>
                  </a>
                  <ul class="treeview-menu">
                     <li data-item=""><a href="#"><i class="fa fa-table"></i> Quadro de notas</a></li>
                  </ul>
               </li>
               <li class="treeview">
                  <a href="#">
                     <i class="fa fa-book"></i> <span>Relatórios</span>
                     <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                     </span>
                  </a>
                  <ul class="treeview-menu">
                     <li data-item=""><a href="#"><i class="fa fa-bank"></i> Boleto bancário</a></li>
                     <li data-item=""><a href="#"><i class="fa fa-user"></i> Boleto por aluno</a></li>
                     <li>
                        <a href="#"><i class="fa fa-thumbs-o-up"></i> Declarações
                           <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                           </span>
                        </a>
                        <ul class="treeview-menu">
                           <li data-item=""><a href="#"><i class="fa fa-check-circle-o"></i> Aluno matriculado</a></li>
                           <li data-item=""><a href="#"><i class="fa fa-trophy"></i> Aluno foi aprovado</a></li>
                           <li data-item=""><a href="#"><i class="fa fa-square"></i> Aluno estudou</a></li>
                           <li data-item=""><a href="#"><i class="fa fa-star"></i> Aluno estuda</a></li>
                        </ul>
                     </li>
                  </ul>
               </li>
            </ul>
         </section>
         <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">

         <section class="content-header">
            @if( $_menuTitle && $_groupTitle )
               <h1> {{ $_menuTitle }} </h1>
               <ol class="breadcrumb">
                  <li><a href="#"><i class="fa fa-dashboard"></i> {{ $_groupTitle }}</a></li>
                  <li class="active">{{ $_menuTitle }}</li>
               </ol>
            @endif
         </section>

         <!-- Main content -->
         <section class="content">

            @if ( $errors && $errors->any() )

               <div class="row">
                  <div class="col-md-12">
                     <div class="alert alert-danger margin-top-10" role="alert">
                       <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                       <span class="sr-only">Erro(s) encontrado(s)!</span>
                       Por favor verifique as inconsistências encontradas abaixo.
                     </div>
                  </div>
               </div>

            @endif

            @if (Session::has('message'))
         		<div class="flash alert-info">
         		</div>
         		<div class="alert alert-success" role="alert">
         		  <span class="glyphicon glyphicon glyphicon-ok" aria-hidden="true"></span>
         		  <span class="sr-only">Message:</span>
         			{{ Session::get('message') }}
         		</div>
         	@endif

            @yield('content')

         </section>

      </div>

      <!-- /.content-wrapper -->
      <footer class="main-footer">
         <div class="pull-right hidden-xs">
            <b>Version</b> 1.0.0
         </div>
         <strong>Copyright &copy; 2014-2016 <a href="https://valterjunior.github.io/">Valter Junior</a>.</strong> Todos os direitos reservados.
      </footer>

      @include('layouts.partials._javascripts')

      <!-- DataTables -->
   	<script src="/plugins/datatables/jquery.dataTables.min.js"></script>
   	<script src="/plugins/datatables/dataTables.bootstrap.min.js"></script>
      <script src="/plugins/select2/select2.min.js"></script>
      <script src="/plugins/input-mask/jquery.inputmask.js"></script>
      <script src="/plugins/input-mask/jquery.inputmask.regex.extensions.js"></script>

      <script>

         $("ul.sidebar-menu > li.treeview > ul.treeview-menu > li").each( function(index){

            var parent = $(this).parent().parent();

            if( $(this).data("item") === "{{ $controller }}" ){
               $(this).addClass("active");
               parent.addClass("active");
            }else{

               if(  $(this).hasClass("active") ){
                  $(this).removeClass("active");
                  parent.removeClass("active");
               }

            }

         });

      </script>

      @yield('extra_scripts')

   </body>

   @endsection
