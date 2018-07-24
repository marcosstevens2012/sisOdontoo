@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>LISTADO DE PROVEEDORES <a href="proveedor/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('insumo.proveedor.search')
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table id="example1" class="table table-striped table-bordered table-condensed table-hover">
					<thead style="background: #9BE2F3;">
						
						<th>Nombre</th>
						<th>Apellido</th>
						<th>Num. docu</th>
						<th>Email</th>
						<th>Opciones</th>
					</thead>
					<!-- bucle -->
					@foreach ($proveedores as $per)
					<tr>
						
						<td>{{$per->nombre}}</td>
						<td>{{$per->apellido}}</td>
						<td>{{$per->dni}}</td>
						<td>{{$per->email}}</td>
						<td>
							<a href="{{URL::action('ProveedorController@show', $per->idproveedor)}}"><button class="btn btn-info"> Detalles</button></a>
							<a href="{{URL::action('ProveedorController@edit', $per->idproveedor)}}"><button class="btn btn-info"> Editar</button></a>
							<a href="" data-target="#modal-delete-{{$per->idproveedor}}" data-toggle="modal"><button class="btn btn-danger"> Eliminar</button></a>
						</td>
					</tr>
					@include('insumo.proveedor.modal')
					@endforeach
					
				</table>
				
			</div>
			{{$proveedores->render()}}
			
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