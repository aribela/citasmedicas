@extends('plantilla')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Crear paciente</h1>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-body">
                <form action="" method="post">
                    @csrf
    
                    <div class="form-group">
                        <h2>Nombre completo:</h2>
                        <input type="text" name="name" id="" class="form-control input-lg">
                    </div>

                    <div class="form-group">
                        <h2>Documento:</h2>
                        <input type="text" name="documento" id="" class="form-control input-lg">
                    </div>

                    <div class="form-group">
                        <h2>Email</h2>
                        <input type="email" name="email" id="email" class="form-control input-lg" required value="{{old('email')}}">
                        @error('email')
                        <div class="alert alert-danger">El email ya existe</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <h2>Contraseña</h2>
                        <input type="text" name="password" id="password" class="form-control input-lg" required value="">
                    </div>

                    <button class="btn btn-primary btn-lg" type="submit">Agregar</button>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection