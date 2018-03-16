@extends ('layouts.admin')
@section ('contenido')

	<?php
	$recibir = $_GET['idprofesional'];
	?>

	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>LISTADO DE LIQUIDACIONES</h3>
			@include('profesional.liquidacion.search')
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striliq table-bordered table-condensed table-hover">
					<thead>
						
						<th>Fecha</th>
						<th>Paciente</th>
						<th>Obra Social</th>
						<th>Tratamiento</th>
						<th>Total</th>
						<th>Opciones</th>
					</thead>
					<!-- bucle -->
					@foreach ($liquidaciones as $liq)
					@if($liq->profesional == $recibir)
					<tr>
						<td>{{$liq->fecha}}</td>
						<td>{{$liq->pacientenombre}}</td>
						<td>{{$liq->obrasocial}}</td>
						<td>{{$liq->prestacion}}</td>
						<td>{{$liq->coseguro}}</td>
						<td>
							<a href="{{URL::action('LiquidacionController@show', $liq->profesional)}}"><button class="btn btn-info">Detalles</button></a>
						</td>
					</tr>
					@endif
					@include('profesional.liquidacion.modal')
					@endforeach
					
				</table>
				
			</div>
			
			
		</div>
	</div>
@endsection