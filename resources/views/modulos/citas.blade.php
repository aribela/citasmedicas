@extends('plantilla')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        @if($doctor->sexo == "femenino")
        <h2>Doctora: {{$doctor->name}}</h2>
        @else
        <h2>Doctor: {{$doctor->name}}</h2>
        @endif
        <h2>Horarios</h2>

        @if($horarios == null)
            @if(auth()->user()->rol == "Doctor")
            <form action="{{url('horario')}}" method="post">
                @csrf
                @method('post')
                <div class="row">
                    <div class="col-sm-2">
                        Desde: <input type="time" name="horaInicio" id="horaInicio" class="form-control" value="">
                    </div>

                    <div class="col-sm-2">
                        Hasta: <input type="time" name="horaFin" id="horaFin" class="form-control" value=""> >
                    </div>

                    <div class="col-sm-1">
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </div>
            </form>
            @endif
        @else
        @foreach($horarios as $horario)
        @if(auth()->user()->rol == "Doctor")
        <form action="{{url('editar-horario/'.$horario->id)}}" method="post">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-sm-2">
                    Desde: <input type="time" name="horaInicioE" id="horaInicioE" class="form-control" value="{{$horario->horaInicio}}">
                </div>

                <div class="col-sm-2">
                    Hasta: <input type="time" name="horaFinE" id="horaFinE" class="form-control" value="{{$horario->horaFin}}">
                </div>

                <div class="col-sm-1">
                    <button type="submit" class="btn btn-success">Editar</button>
                </div>
            </div>
        </form>
        @elseif(auth()->user()->rol == "Paciente")
        <h2>{{$horario->horaInicio}} - {{$horario->horaFin}}</h2>
        @endif
        @endforeach
        @endif
    </section>

    <section class="content">
        <div class="box">
            <div class="box-body">
                <div id="calendario"></div>
            </div>
        </div>

        <div class="modal face" id="citasModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="" method="post">
                        @csrf
                        <input type="hidden" name="doctor_id" id="doctor_id" value="{{auth()->user()->id}}">
                        <div class="modal-body">
                            <div class="box-body">
                                <div class="form-group">
                                    <h2>Seleccionar paciente</h2>
                                    <div class="col-sm-12">
                                        <select name="paciente_id" id="paciente_id" class="select2" required style="width: 100%">
                                            <option value="">Seleccione...</option>
                                            @foreach($pacientes as $paciente)
                                            <option value="{{$paciente->id}}">{{$paciente->name.' - '.$paciente->documento}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h2>Fecha</h2>
                                    <input type="text" class="form-control input-lg" readonly name="fecha" id="fecha">
                                </div>
                                <div class="form-group">
                                    <h2>Hora</h2>
                                    <input type="text" class="form-control input-lg" readonly name="hora" id="hora">

                                    <input type="hidden" class="form-control input-lg" readonly name="FyHinicio" id="FyHinicio">

                                    <input type="hidden" class="form-control input-lg" readonly name="FyHfinal" id="FyHfinal">
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Pedir cita</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal face" id="eventoModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{url('borrar-cita')}}" method="post">
                @csrf
                @method('delete')
                <div class="modal-body">
                    <div class="form-group">
                        <h2>Paciente</h2>
                        <h4 id="paciente"></h4>
                        <input type="hidden" name="idCitaE" id="idCitaE" value="">
                        <input type="hidden" name="doctor_idE" id="doctor_idE" value="{{$doctor_id}}">
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cerrar</button>
                    <button type="submite" class="btn btn-warning">Cancelar citas</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="cita">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="post">
                @csrf
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <input type="hidden" name="doctor_id" value="{{$doctor_id}}">
                            <input type="hidden" name="paciente_id" value="{{auth()->user()->id}}">
                        </div>

                        <div class="form-group">
                            <h2>Fecha:</h2>
                            <input type="text" name="fecha" id="fechaP" class="form-control input-lg" readonly>
                        </div>

                        <div class="form-group">
                            <h2>Hora:</h2>
                            <input type="text" name="hora" id="horaP" class="form-control input-lg" readonly>
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="FyHinicio" id="FyHinicioP" class="form-control input-lg" readonly>
                            <input type="hidden" name="FyHfinal" id="FyHfinalP" class="form-control input-lg" readonly>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cerrar</button>
                    <button class="btn btn-primary" type="submit">Pedir cita</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection