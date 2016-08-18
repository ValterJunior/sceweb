@extends('layouts.login')

@section('content')

<div class="login-box">
   <div class="login-logo">
      <a href="../../index2.html"><b>SCE</b>WEB</a>
   </div>
   <!-- /.login-logo -->
   <div class="login-box-body">
      <p class="login-box-msg">Login do sistema</p>

      {!! Form::open( [ 'url' => '/login' ] ) !!}
         <div class="form-group has-feedback">

            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif

         </div>

         <div class="form-group has-feedback">

            <input id="password" type="password" class="form-control" name="password" placeholder="Senha">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif

         </div>

         <div class="row">
            <div class="col-xs-8">
               <div class="checkbox icheck">
                  <label>
                     <input type="checkbox" name="remember"> Lembrar minha senha
                  </label>
               </div>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
               <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
            </div>
            <!-- /.col -->
         </div>
      {!! Form::close() !!}

      <a class="btn btn-link" href="{{ url('/password/reset') }}"> Esqueci minha senha</a> <br>

   </div>
   <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

@endsection
