@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>LISTADO DE PIEZS <a href="pieza/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('mecanico.pieza.search')
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						
						<th>Nombre</th>
						<th>Estado</th>
						<th>Descripcion</th>
						<th>Opciones</th>
					</thead>
					<!-- bucle -->
					@foreach ($piezas as $pie)
					<tr>
						
						<td>{{$pie->nombre}}</td>
						<td>{{$pie->estado}}</td>
						<td>{{$pie->descripcion}}</td>
						<td>
							<a href="{{URL::action('PiezasController@show', $pie->idpieza)}}"><button class="btn btn-info"> Detalles</button></a>
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
@endsection