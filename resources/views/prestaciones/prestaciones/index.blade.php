@extends ('layouts.admin')
@section ('contenido')
	<?php
	$recibir = $_GET['idprofesional'];
	?>

	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Prestaciones</p><a href="prestaciones/create"><button class="btn btn-success">Nuevo</button></a><a href="{{url('profesional/profesional')}}"><button class="btn btn-info">Profesionales</button></a></h3>

			@include('prestaciones.prestaciones.search')
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Profesional</th>
						<th>Prestacion</th>
						<th>Plus ($)</th>
						<th>Tiempo</th>
					</thead>
					<!-- bucle -->
					@foreach ($prestaciones as $pre)
					@if($pre->idprofesional == $recibir)
					<tr>
						<td>{{$pre->nombre . " " . $pre->apellido}}</td>
						<td>{{$pre->prestacion}}</td>
						<td>${{" " . $pre->costo}}</td>
						<th>{{$pre->tiempo}}</th>
						<td>
							<a href="{{URL::action('PrestacionProfesionalController@edit', $pre->idprestacionprof)}}"><button class="btn btn-info">Editar</button></a>
							<a href="" data-target="#modal-delete-{{$pre->idprestacion}}" data-toggle="modal"><button class="btn btn-danger"> Eliminar</button></a>
						</td>
					</tr>
					@endif
					@include('prestaciones.prestaciones.modal')
					@endforeach
					
				</table>
				
			</div>
			{{$prestaciones->render()}}
			
		</div>

	</div>
@endsection