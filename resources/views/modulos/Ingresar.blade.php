@extends('plantilla')

@section('content')

    <div class="login-box">
        <div class="login-logo">
            <h1>Librería</h1>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Inicio de Sesión</p>

            <form action="{{ route('login') }}" method="post">

                @csrf

            <div class="form-group has-feedback">

                <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required="">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>

                @error('email')

                    <br>
                    <div class="alert alert-danger">Error con el Email...</div>

                @enderror

            </div>

            <div class="form-group has-feedback">

                <input type="password" name="password" class="form-control" placeholder="Contraseña">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>

            </div>

            <div class="row">

                <div class="col-xs-12">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
                </div>
                <!-- /.col -->
            </div>
            </form>

           

        </div>
        <!-- /.login-box-body -->
    </div>

@endsection