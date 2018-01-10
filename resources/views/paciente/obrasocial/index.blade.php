@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Obras Sociales <a href="obrasocial/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('paciente.obrasocial.search')
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Nombre</th>
						<th>Telefono</th>
						<th>Email</th>
						<th>Numero</th>
						<th>Estado</th>
						<th>Opciones</th>
					</thead>
					<!-- bucle -->
					@foreach ($obrasocial as $obr)
					<tr>
						<td>{{$obr->nombre}}</td>
						<td>{{$obr->telefono}}</td>
						<td>{{$obr->email}}</td>
						<td>{{$obr->numero}}</td>
						<td>{{$obr->estado}}</td>
						<td>
							<a href="{{URL::action('ObrasocialController@edit', $obr->idobrasocial)}}"><button class="btn btn-info"> Editar</button></a>
							<a href=""><button class="btn btn-info">Prestaciones</button></a>
							<a href="" data-target="#modal-delete-{{$obr->idobrasocial}}" data-toggle="modal"><button class="btn btn-danger"> Eliminar</button></a>
						</td>
					</tr>
					@include('paciente.obrasocial.modal')
					@endforeach
					
				</table>
				
			</div>
			{{$obrasocial->render()}}
			
		</div>
	</div>
@endsection