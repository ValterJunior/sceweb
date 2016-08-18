@extends('layouts.main')

@section('extra_head')
   <link rel="stylesheet" type="text/css" href="/plugins/iCheck/square/blue.css" />
@endsection

@section('body_content')

   <body class="hold-transition login-page">

      @yield('content')

       @include('layouts.partials._javascripts')

       <script src="/plugins/iCheck/icheck.min.js"></script>

       <script>
         $(function () {
           $('input').iCheck({
             checkboxClass: 'icheckbox_square-blue',
             radioClass: 'iradio_square-blue',
             increaseArea: '20%' // optional
           });
         });
       </script>

   </body>

@endsection
