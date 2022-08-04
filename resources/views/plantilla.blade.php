<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Clinica</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css')}}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ asset('bower_components/morris.js/morris.css')}}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset('bower_components/jvectormap/jquery-jvectormap.css')}}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">

  <!-- Fullcalendar -->
  <link rel="stylesheet" href="{{ asset('bower_components/fullcalendar/dist/fullcalendar.min.css')}}">
  <link rel="stylesheet" href="{{ asset('bower_components/fullcalendar/dist/fullcalendar.print.css')}}" media="print">
 
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('bower_components/datatables.net-bs/css/responsive.bootstrap.min.css') }}">

  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('bower_components/select2/dist/css/select2.min.css') }}">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini  login-page">
  
  
  @if(Auth::user())
  <div class="wrapper">
  @include('modulos.cabecera')
  @if(auth()->user()->rol == "Secretaria")
  @include('modulos.menuSecretaria')
  @elseif(auth()->user()->rol == "Doctor")
  @include('modulos.menuDoctor')
  @elseif(auth()->user()->rol == "Paciente")
  @include('modulos.menuPaciente')
  @elseif(auth()->user()->rol == "Administrador")
  @include('modulos.menuAdministrador')
  @endif
  @yield('content')
</div>
  
@else
@yield('contenido')
@endif
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- Morris.js charts -->
<script src="{{ asset('bower_components/raphael/raphael.min.js')}}"></script>
<script src="{{ asset('bower_components/morris.js/morris.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{ asset('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{ asset('bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{ asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{ asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{ asset('bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- <script src="{{ asset('dist/js/pages/dashboard.js')}}"></script> --}}
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js')}}"></script>

<!-- DataTables -->

<script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('bower_components/datatables.net-bs/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

<!-- Fullcalendar -->
<script src="{{ asset('bower_components/fullcalendar/dist/fullcalendar.min.js') }}"></script>
<script src="{{ asset('bower_components/fullcalendar/dist/locale/es.js') }}"></script>
<script src="{{ asset('bower_components/moment/moment.js') }}"></script>

<!-- Select2 -->
<script src="{{ asset('bower_components/select2/dist/js/select2.js') }}"></script>

<script>
  $(".table").DataTable({
    "language": { 
      "sSearch": "Buscar:",
      "sEmptyTable": "No hay datos en la Tabla",
      "sZeroRecords": "No se encontraron resultados",
      "sInfo": "Mostrando registros del _START_ al _END_ de un total _TOTAL_",
      "SInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
      "sInfoFiltered": "(filtrando de un total de _MAX_ registros)",
      "oPaginate": {
          "sFirst": "Primero",
          "sLast": "Último",
          "sNext": "Siguiente",
          "sPrevious": "Anterior"
      },
      "sLoadingRecords": "Cargando...",
      "sLengthMenu": "Mostrar _MENU_ registros"
    }
});

$(".select2").select2();
</script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session('registrado') == 'Si')
<script>
  Swal.fire(
    'El doctor ha sido registrado',
    '',
    'success'
  )
</script>
@elseif(session('agregado') == 'Si')
<script>
  Swal.fire(
    'El paciente ha sido registrado',
    '',
    'success'
  )
</script>
@elseif(session('actualizadoP') == 'Si')
<script>
  Swal.fire(
    'El paciente ha sido actualizado',
    '',
    'success'
  )
</script>
@elseif(session('secretariaCreada') == 'Si')
<script>
  Swal.fire(
    'La secretaria ha sido agregada',
    '',
    'success'
  )
</script>
@elseif(session('actualizadoS') == 'Si')
<script>
  Swal.fire(
    'La secretaria ha sido actualizada',
    '',
    'success'
  )
</script>
@endif



<script>
  $('.table').on('click', '.EliminarDoctor', function(){
    var did = $(this).attr('did');
    Swal.fire({
      title: '¿Seguro que desea eliminar este doctor?',
      icon: 'warning',
      showCancelButton: true,
      cancelButtonText: 'Cancelar',
      cancelButtonColor: "#d33",
      confirmButtonText: 'Eliminar',
      confirmButtonColor: "#3085d6"
    }).then((result) => {
      if(result.isConfirmed){
        window.location = "eliminar-doctor/"+did;
      }
    }) 
  });

  $('.table').on('click', '.eliminarPaciente', function(){
    var pid = $(this).attr('pid');
    var paciente = $(this).attr('paciente');

    Swal.fire({
      title: '¿Seguro que desea eliminar el paciente '+paciente+'?',
      icon: 'warning',
      showCancelButton: true,
      cancelButtonText: 'Cancelar',
      cancelButtonColor: "#d33",
      confirmButtonText: 'Eliminar',
      confirmButtonColor: "#3085d6"
    }).then((result) => {
      if(result.isConfirmed){
        window.location = "eliminar-paciente/"+pid;
      }
    }) 
  });

  $('.table').on('click', '.eliminarSecretaria', function(){
    var sid = $(this).attr('sid');
    Swal.fire({
      title: '¿Seguro que desea eliminar esta secretaria?',
      icon: 'warning',
      showCancelButton: true,
      cancelButtonText: 'Cancelar',
      cancelButtonColor: "#d33",
      confirmButtonText: 'Eliminar',
      confirmButtonColor: "#3085d6"
    }).then((result) => {
      if(result.isConfirmed){
        window.location = "eliminar-secretaria/"+sid;
      }
    }) 
  });
</script>

@if(isset($editarsid))
<script>
  console.log("editarsid: " + {{$editarsid}});
  $(document).ready(function(){
    $("#editarSecretaria").modal('toggle');
  });
</script>
@endif

<script>
  var date = new Date();
  var d = date.getDate(), m= date.getMonth(), a = date.getFullYear();
  
  if($("#calendario").length){
    $("#calendario").fullCalendar({
      defaultView: 'agendaWeek',
      hiddenDays: [0,6],
      events:[
        @if(isset($citas))
      @foreach($citas as $cita)
        @if(auth()->user()->rol == "Doctor")
        {
          id: '{{$cita->id}}',
          title: '{{$cita->obtPaciente->name}}',
          start: '{{$cita->FyHinicio}}',
          end: '{{$cita->FyHfinal}}'
        },
        @elseif(auth()->user()->rol == "Paciente")
        {
          id: '{{$cita->id}}',
          title: '{{$cita->obtPaciente->name}}',
          start: '{{$cita->FyHinicio}}',
          end: '{{$cita->FyHfinal}}'
        },
        @endif
      @endforeach
        @endif
      ],
      @if(isset($horario))
      scrollTime: "{{$horario->horaInicio}}",
      minTime: "{{$horario->horaInicio}}",
      maxTime: "{{$horario->horaFin}}",
      @else
      scrollTime: null,
      minTime: null,
      maxTime: null,
      @endif
      dayClick:function(date, jsEvent, view){
        var fecha = date.format();
        var hora = ("01:00:00").split(":");
        fecha = fecha.split("T");
        // alert(fecha[1]);
        var hora1 = (fecha[1]).split(":");
        var hi = parseFloat(hora1[0]);
        var ha = parseFloat(hora[0]);
        var horaFinal = hi+ha;
        if(horaFinal < 10 && horaFinal > 0){
          var hf = "0"+horaFinal+":00:00";
        }else{
          var hf = horaFinal+":00:00";
        }

        // alert(date);
        n = new Date();
        y = parseInt(n.getFullYear());
        m = parseInt(n.getMonth()+1);
        d = parseInt(n.getDate());

        let M = (m < 10) ? "0"+m: m;//agregar 0 al mes
        let D = (d < 10) ? "0"+d: d;//agregar 0 al dia
        
        let diaActual = y + "-" + M + "-" + D;
        console.log(diaActual+" "+fecha[0]);

        if(diaActual <= fecha[0]){
          @if(auth()->user() != null)
          if("{{auth()->user()->rol}}" == "Doctor"){
            $("#citasModal").modal();
            $("#fecha").val(fecha[0]);
            $("#hora").val(hora1[0]+":00:00");
            $("#FyHinicio").val(fecha[0]+" "+hora1[0]+":00:00");
            $("#FyHfinal").val(fecha[0]+" "+hf);
          }else if("{{auth()->user()->rol}}" == "Paciente"){
            $("#cita").modal();
            $("#fechaP").val(fecha[0]);
            $("#horaP").val(hora1[0]+":00:00");
            $("#FyHinicioP").val(fecha[0]+" "+hora1[0]+":00:00");
            $("#FyHfinalP").val(fecha[0]+" "+hf);
          }
          @endif
        }

      },
      eventClick:function(calEvent, jsEvent, view){
        @if(auth()->user() != null)
          if("{{auth()->user()->rol}}" == "Doctor"){
            $("#eventoModal").modal();
          }
        @endif

        $("#paciente").html(calEvent.title);
        console.log(calEvent.id);
        $("#idCitaE").val(calEvent.id);
      }
    });
  }
</script>


</body>
</html>
