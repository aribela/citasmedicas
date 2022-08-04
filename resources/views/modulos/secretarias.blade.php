@extends('plantilla')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Secretarias</h1>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header">
                <button class="btn btn-primary" data-toggle="modal" data-target="#crearSecretaria">Crear secretaria</button>
            </div>
            <div class="box-body">
                <table class="table table-hover table-bordered striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Documento</th>
                            <th>Telefono</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($secretarias as $secretaria)
                        <tr>
                            <td>{{$secretaria->id}}</td>
                            <td>{{$secretaria->name}}</td>
                            <td>{{$secretaria->email}}</td>
                            <td>
                                @if($secretaria->documento != "")
                                {{$secretaria->documento}}
                                @else
                                No registrado
                                @endif
                            </td>
                            <td>
                                @if($secretaria->telefono != "")
                                {{$secretaria->telefono}}
                                @else
                                No registrado
                                @endif
                            </td>
                            <td>
                                <a href="{{url('editar-secretaria/'.$secretaria->id)}}">
                                    <button class="btn btn-success">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                </a>
                                <button class="btn btn-danger eliminarSecretaria" sid="{{$secretaria->id}}">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="crearSecretaria">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="post">
                @csrf
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <h2>Nombre completo</h2>
                            <input type="text" name="name" id="name" class="form-control input-lg"  value="{{old('name')}}">
                        </div>

                        <div class="form-group">
                            <h2>Email</h2>
                            <input type="email" name="email" id="email" class="form-control input-lg"  value="{{old('email')}}">
                            @error('email')
                            <div class="alert alert-danger">El email ya existe</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <h2>Contraseña</h2>
                            <input type="text" name="password" id="password" class="form-control input-lg" required>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-danget" type="button" data-dismiss="modal">Cerrar</button>
                    <button class="btn btn-primary" type="submit">Crear</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editarSecretaria">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{url('actualizar-secretaria/'.$secretaria->id)}}" method="post">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <h2>Nombre completo</h2>
                            <input type="text" name="name" id="name" class="form-control input-lg"  value="{{$secretaria->name}}">
                        </div>

                        <div class="form-group">
                            <h2>Email</h2>
                            <input type="email" name="email" id="email" class="form-control input-lg"  value="{{$secretaria->email}}">
                            @error('email')
                            <div class="alert alert-danger">El email ya existe</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <h2>Nueva Contraseña</h2>
                            <input type="text" name="passwordN" id="passwordN" class="form-control input-lg" value="">
                            <input type="hidden" name="password" id="password" value="{{$secretaria->password}}" >
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-danget" type="button" data-dismiss="modal">Cerrar</button>
                    <button class="btn btn-success" type="submit">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection