@extends('plantilla')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Doctores del consultorio <br><b>{{$consultorio->consultorio}}</b></h1>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Nombre y apellido</th>
                            <th>Email</th>
                            <th>Telefono</th>
                            <th>Horario</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($doctores as $doctor)
                            <tr>
                                <td>{{$doctor->name}}</td>
                                <td>{{$doctor->email}}</td>
                                <td>
                                    @if($doctor->telefono != "")
                                    {{$doctor->telefono}}
                                    @else
                                    No disponible
                                    @endif
                                </td>
                                <td>
                                   @if($doctor->horaInicio != "")
                                    {{$doctor->horaInicio}} - {{$doctor->horaFin}}
                                    @else
                                    No registrado
                                    @endif
                                </td>
                                <td>
                                    @if($doctor->horaInicio != "")
                                    <a href="{{url('citas/'.$doctor->idUser)}}">
                                        <button class="btn btn-primary">Agenda de citas</button>
                                    </a>
                                    @endif
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