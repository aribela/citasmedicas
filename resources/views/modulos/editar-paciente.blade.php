@extends('plantilla')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Editar paciente {{$paciente->name}}</h1>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header">
                <a href="{{url('pacientes')}}">
                    <button class="btn btn-primary">Volver a pacientes</button>
                </a>


            </div>

            <div class="box-body">
                <form action="{{url('actualizar-paciente/'.$paciente->id)}}" method="post">
                    @csrf
                    @method('put')
    
                    <div class="form-group">
                        <h2>Nombre completo:</h2>
                        <input type="text" name="name" id="" class="form-control input-lg" value="{{$paciente->name}}">
                    </div>

                    <div class="form-group">
                        <h2>Documento:</h2>
                        <input type="text" name="documento" id="" class="form-control input-lg" value="{{$paciente->documento}}">
                    </div>

                    <div class="form-group">
                        <h2>Email</h2>
                        <input type="email" name="email" id="email" class="form-control input-lg"  value="{{$paciente->email}}">
                        @error('email')
                        <div class="alert alert-danger">El email ya existe</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <h2>Contraseña</h2>
                        <input type="text" name="passwordN" id="passwordN" class="form-control input-lg" value="">
                        <input type="hidden" name="password" id="password" class="form-control input-lg" value="{{$paciente->password}}">
                    </div>

                    <input type="hidden" name="telefono" id="telefono" class="form-control input-lg"  value="{{$paciente->telefono}}">

                    <button class="btn btn-success btn-lg" type="submit">Guardar</button>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection