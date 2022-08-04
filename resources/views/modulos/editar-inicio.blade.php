@extends('plantilla')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Editar inicio</h1>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-body">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <h2>Dias:</h2>
                            <input type="text" class="form-control input-lg" name="dias" value="{{$inicio->dias}}">

                            <div class="form-group">
                                <h2>Horarios:</h2>
                                Desde: <input type="time" name="horaInicio" id="" class="form-control input-lg" value="{{$inicio->horaInicio}}">

                                Hasta: <input type="time" name="horaFin" id="" class="form-control input-lg" value="{{$inicio->horaFin}}">
                            </div>

                            <h2>Direccion:</h2>
                            <input type="text" name="direccion" id="" class="form-control input-lg" value="{{$inicio->direccion}}">

                            <h2>Telefono:</h2>
                            <input type="text" name="telefono" id="" class="form-control input-lg" value="{{$inicio->telefono}}">

                            <h2>Correo:</h2>
                            <input type="email" name="email" id="" class="form-control input-lg" value="{{$inicio->email}}">
                        </div>

                        <div class="col-md-6 col-xs-12">
                            <br><br>
                            <h2>Logo:</h2>
                            <input type="file" name="logoN" id="" class="form-control">
                            <br>
                            @if($inicio->logo != "")
                            <img width="200px" src="{{ asset('storage/'.$inicio->logo) }}" alt="">
                            @endif
                            <input type="hidden" name="logoActual" value="{{$inicio->logo}}">

                            <br><br>

                            <button type="submit" class="btn btn-success">Guardar cambios</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection