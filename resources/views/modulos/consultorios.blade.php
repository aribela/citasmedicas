@extends('plantilla')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Consultorios</h1>
    </section>

    <section class="content">
        <div class="box">
            <br>
            <form action="" method="post">
                @csrf
                <div class="col-xs-12 col-md-6">
                    <input type="text" class="form-control" name="consultorio" id="consultorio" placeholder="Consultrio" required>
                </div>
                <button class="btn btn-primary" type="submit">Agregar consultorio</button>
            </form>

            <br>

            <div class="box-body">
                @foreach($consultorios as $consultorio)
                
                    <div class="row">
                        <form action="{{url('Consultorio/'.$consultorio->id)}}" method="post">
                            @csrf
                            @method('put')
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="consultorioE" id="consultorioE" value="{{$consultorio->consultorio}}">
                            </div>
                            <div class="col-md-1">
                                <button class="btn btn-success" type="submit">Guardar</button>
                            </div>
                        </form>
                        
                        <div class="col-md-1">
                            
                            <form action="{{url('borrar-consultorio/'.$consultorio->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Borrar</button>
                            </form>
                        </div>
                    </div><br>
                @endforeach
            </div>
        </div>
    </section>
</div>
@endsection