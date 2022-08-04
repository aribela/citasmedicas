@extends('plantilla')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Doctores</h1>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header">
                <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#creardoctor">Crear doctor</button>
            </div>

            <div class="box-body">
                <table class="table table-bordered table-hover table-striped dt-responsive">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Consultorio</th>
                            <th>Email</th>
                            <th>Documento</th>
                            <th>Telefono</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($doctores as $doctor)
                        @if($doctor->rol == "Doctor")
                        <tr>
                            <td>{{$doctor->id}}</td>
                            <td>{{$doctor->name}}</td>
                            <td>{{$doctor->consultorioRow->consultorio}}</td>
                            <td>{{$doctor->email}}</td>
                            
                            <td>
                                @if($doctor->documento != "")
                                {{$doctor->documento}}
                                @else
                                No registrado
                                @endif
                            </td>
                            <td>
                                @if($doctor->telefono != "")
                                {{$doctor->telefono}}
                                @else
                                No disponible
                                @endif
                            </td>
                            <td>
                                <button class="btn btn-danger EliminarDoctor" did="{{$doctor->id}}"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<div id="creardoctor" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="post">
                @csrf
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <h2>Nombre completo</h2>
                            <input type="text" name="name" id="name" class="form-control input-lg" required value="">
                        </div>
                        <div class="form-group">
                            <h2>Sexo</h2>
                            <select name="sexo" id="sexo" class="form-control input-lg" required>
                                <option value="">Seleccionar</option>
                                <option value="femenino">Femenino</option>
                                <option value="masculino">Masculino</option>
                            </select>
                        </div>
                   
                        <div class="form-group">
                            <h2>Consultorio</h2>
                            <select name="id_consultorio" id="id_consultorio" class="form-control input-lg" required>
                                <option value="">Seleccionar</option>
                                @foreach($consultorios as $consultorio)
                                <option value="{{$consultorio->id}}">{{$consultorio->consultorio}}</option>
                                @endforeach
                            </select>
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
                    </div>

                   
                    
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Crear</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection