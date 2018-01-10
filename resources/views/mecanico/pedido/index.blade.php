@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>LISTADO DE MECANICOS <a href="mecanico/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('mecanico.mecanico.search')
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						
						<th>Nombre</th>
						<th>Apellido</th>
						<th>Num. docu</th>
						<th>Email</th>
						<th>Estado</th>
						<th>Opciones</th>
					</thead>
					<!-- bucle -->
					@foreach ($mecanicos as $per)
					<tr>
						
						<td>{{$per->nombre}}</td>
						<td>{{$per->apellido}}</td>
						<td>{{$per->dni}}</td>
						<td>{{$per->email}}</td>
						<td>{{$per->estado}}</td>
						<td>
							<a href="{{URL::action('MecanicoController@show', $per->idmecanico)}}"><button class="btn btn-info"> Detalles</button></a>
							<a href="{{URL::action('MecanicoController@edit', $per->idmecanico)}}"><button class="btn btn-info"> Editar</button></a>
							<a href="" data-target="#modal-delete-{{$per->idmecanico}}" data-toggle="modal"><button class="btn btn-danger"> Eliminar</button></a>
						</td>
					</tr>
					@include('mecanico.mecanico.modal')
					@endforeach
					
				</table>
				
			</div>
			{{$mecanicos->render()}}
			
		</div>
	</div>
@endsection