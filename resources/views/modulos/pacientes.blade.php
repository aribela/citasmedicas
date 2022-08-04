@extends('plantilla')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Pacientes</h1>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header">
                <a href="crear-paciente">
                    <button class="btn btn-primary btn-lg">Agregar paciente</button>
                </a>

            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Documento</th>
                            <th>Email</th>
                            <th>Telefono</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pacientes as $paciente)
                        <tr>
                            <td>{{$paciente->id}}</td>
                            <td>{{$paciente->name}}</td>
                            <td>{{$paciente->documento}}</td>
                            <td>{{$paciente->email}}</td>
                            @if($paciente->telefono != "")
                            <td>{{$paciente->telefono}}</td>
                            @else
                            <td>No disponible</td>
                            @endif()
                            <td>
                                <a href="{{url('editar-paciente/'.$paciente->id)}}">
                                    <button class="btn btn-success"><i class="fa fa-pencil"></i></button>
                                </a>
                                <button class="btn btn-danger eliminarPaciente" pid="{{$paciente->id}}" paciente="{{$paciente->name}}"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection