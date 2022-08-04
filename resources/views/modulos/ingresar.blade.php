@extends('plantilla')

@section('contenido')
<div class="login-box">
    <div class="login-logo">
        <b>Clinica Medica</b>
    </div>

    <div class="login-box-body">
        <p class="login-box-msg">Ingresar al sistema</p>
        <form action="{{route('login')}}" method="post">
            @csrf
            <div class="form-group has-feedback">
                <input type="email" name="email" id="email" class="form-control" required="" value="">
                @error('email')
                <br>
                <div class="alert alert-danger">Error con el email</div>
                @enderror
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <input type="password" name="password" id="password" class="form-control" required="" value="">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection