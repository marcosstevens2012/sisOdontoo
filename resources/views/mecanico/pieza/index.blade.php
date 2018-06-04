@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>LISTADO DE PIEZAS <a href="pieza/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('mecanico.pieza.search')
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table id="example1" class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						
						<th>Nombre</th>
						<th>Descripcion</th>
						<th>Estado</th>
						<th>Opciones</th>
					</thead>
					<!-- bucle -->
					@foreach ($piezas as $pie)
					<tr>
						
						<td>{{$pie->nombre}}</td>
						<td>{{$pie->descripcion}}</td>
						<td>{{$pie->estado}}</td>
						<td>
							<a href="{{URL::action('PiezasController@edit', $pie->idpieza)}}"><button class="btn btn-info"> Editar</button></a>
							<a href="" data-target="#modal-delete-{{$pie->idpieza}}" data-toggle="modal"><button class="btn btn-danger"> Eliminar</button></a>
						</td>
					</tr>
					@include('mecanico.pieza.modal')
					@endforeach
					
				</table>
				
			</div>
			{{$piezas->render()}}
			
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