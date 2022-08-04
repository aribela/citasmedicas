@extends('plantilla')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Historial de citas medicas</h1>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-body">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Fecha y hora</th>
                            <th>Doctor</th>
                            <th>Consultorio</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($citas as $cita)
                        <tr>
                            <td>{{$cita->FyHinicio}}</td>
                            <td>{{$cita->obtDoctor->name}}</td>
                            <td>{{$cita->obtConsultorio($cita->doctor_id)->consultorio}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection