@extends ('layouts.admin')
@section ('contenido')

	<?php
	$recibir = $_GET['idprofesional'];
	?>

	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>LISTADO DE LIQUIDACIONES<a href="liquidacion/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('profesional.liquidacion.search')
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striliq table-bordered table-condensed table-hover">
					<thead>
						
						<th>Fecha</th>
						<th>Profesional</th>
						<th>Obra Social</th>
						<th>Prestacion</th>
						
						<th>Opciones</th>
					</thead>
					<!-- bucle -->
					@foreach ($liquidaciones as $liq)
					@if($liq->idprofesional == $recibir)
					<tr>
						<td>{{$liq->fecha}}</td>
						<td>{{$liq->profesional}} {{$liq->apellido}}</td>
						<td>{{$liq->obrasocial}}</td>
						<td>{{$liq->prestacion}}</td>
						
						<td>
							<a href="{{URL::action('LiquidacionController@show', $liq->idprofesional)}}"><button class="btn btn-info">Detalles</button></a>
							<a href="{{URL::action('LiquidacionController@edit', $liq->idprofesional)}}"><button class="btn btn-info">Editar Estado</button></a>
							<a href="" data-target="#modal-delete-{{$liq->idprofesional}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
						</td>
					</tr>
					@endif
					@include('profesional.liquidacion.modal')
					@endforeach
					
				</table>
				
			</div>
			{{$liquidaciones->render()}}
			
		</div>
	</div>
@endsection