@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<h3>Listado de Turnos <a href="turno/create"><button class="btn btn-success">Nuevo</button></a>
			<br><br>
			@include('turno.turno.search')
		</div>
	</div>
	@if(Session::has('notice'))<!-- crea una alerta de q ha sido creado correctamente el usuario-->
   					<div class="alert alert-info">
   					<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    				<strong>Notice:</strong> {{Session::get('notice') }}</div>
    @endif
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						
						<th>Paciente</th>
						<th>Prestacion</th>
						<th>Profesional</th>
						<th>Estado</th>
						<th>Inicio</th>
						
						<th>Fecha</th>
						<th>Opciones</th>
					</thead>
					<!-- bucle -->
					@foreach ($turnos as $tur)
					<tr>
						<td align="center">{{$tur->paciente}}</td>
						<td align="center" >{{$tur->prestacion}}</td>
						<td align="center">{{$tur->profesional}}</td>
						@if ($tur->estado=='Activo')
						<td align="center"><small class="label pull-right bg-green">{{$tur->estado}}</small></td>
						@elseif ($tur->estado=='Pendiente')
						<td align="center"><small class="label pull-right bg-yellow">{{$tur->estado}}</small></td>
						@else
						<td align="center"> <small class="label pull-right bg-red">{{$tur->estado}}</small></td>
						@endif
						<td align="right">{{$tur->hora_inicio}}</td>
						
						<td align="right"> <?php 
												$originalDate = $tur->fecha;
        										$newDate = date("d-m-Y", strtotime($originalDate));

											?>{{$newDate}}</td>
						<td>
						@if ($tur->estado=='Pendiente')
						<a href="{{URL::action('TurnoController@edit', $tur->idturno)}}"><button class="btn-xs btn-primary"> Estado</button></a>
						@endif
						<a href="{{URL::action('PacienteController@show' , $tur->idpaciente)}}"><button class="btn-xs btn-primary">Paciente</button></a>
              			<a href="{{URL::action('TurnoController@show', $tur->idturno)}}"><button class="btn-xs btn-info"> Seguimiento</button></a>
              			<a href="{{URL::action('PdfturnoController@show', $tur->idturno)}}"><button class="btn-xs btn-info"> Reporte</button></a>
              			<a href="" data-target="#modal-delete-{{$tur->idturno}}" data-toggle="modal"><button class="btn-xs btn-success">En Consultorio</button></a>
						<!--<a href="" onclick="modalEditTurno({{$tur->idturno}})"><button class="btn btn-danger"> Eliminar</button></a>-->
					</tr>
					@include('turno.turno.modal')
					@endforeach
				</table>
				
			</div>
			{{$turnos->render()}}
			
		</div>

	</div>

<script type="text/javascript">
$(document).ready(function(){
    $('#example1').DataTable({


    	"language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
     }
    } );
} 
);

</script>
@endsection