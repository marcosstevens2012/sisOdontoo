@extends ('layouts.admin')
@section ('contenido')
	<?php
	$recibir = $_GET['idobrasocial'];
	?>

	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Prestaciones</p><a href="prestaciones/create"><button class="btn btn-success">Nuevo</button></a><a href="{{url('obrasocial/obrasocial')}}"><button class="btn btn-info">Obra Social</button></a></h3>

			@include('prestaciones.prestaciones.search')
		</div>
	</div>
	<div class="row">
		<div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table id="example1" class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Obra Social</th>
						<th>Prestacion</th>
						<th>Coseguro ($)</th>
						<th>Opciones</th>
					</thead>
					<!-- bucle -->
					@foreach ($prestaciones as $pre)
					@if($pre->idobrasocial == $recibir)
					<tr>
						<td>{{$pre->obrasocial}}</td>
						<td>{{$pre->prestacion}}</td>
						<td>${{" " . $pre->coseguro}}</td>
						<td>
							<a href="{{URL::action('PrestacionObrasocialController@edit', $pre->idprestacionprof)}}"><button class="btn btn-info">Editar</button></a>
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