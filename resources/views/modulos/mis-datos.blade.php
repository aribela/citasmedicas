@extends('plantilla')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Mis datos</h1>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-body">
                <form action="" method="post" enctype="multipart/form">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <h2>Nombre y apellidos</h2>
                            <input class="input-lg" type="text" name="name" id="" value="{{auth()->user()->name}}">

                            @error('name')
                            <p class="alert alert-danger">Error en el nombre</p>
                            @enderror
                            
                            <h2>Email</h2>
                            <input class="input-lg" type="email" name="email" id="" value="{{auth()->user()->email}}">
                            
                            @error('email')
                            <p class="alert alert-danger">El email ya existe</p>
                            @enderror
                            
                            <h2>Nueva Contraseña</h2>
                            <input class="input-lg" type="text" name="passwordN" id="" value="">

                            
                            
                            
                            
                            
                        </div>
                        
                        <div class="col-md-6 col-xs-12">
                            <h2>Documento</h2>
                            <input class="input-lg" type="text" name="documento" id="" value="{{auth()->user()->documento}}">

                            @error('documento')
                            <p class="alert alert-danger">Error en el documento</p>
                            @enderror

                            <h2>Telefono</h2>
                            <input class="input-lg" type="text" name="telefono" id="" value="{{auth()->user()->telefono}}">

                            @error('telefono')
                            <p class="alert alert-danger">Error en el telefono</p>
                            @enderror

                            
                            <br><br><br>
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection