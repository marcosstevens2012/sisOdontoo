@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Consultorios <a href="consultorio/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('profesional.consultorio.search')
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Numero</th>
						<th>Piso</th>
						<th>Sillas</th>
						<th>Estado</th>
						<th>Opciones</th>
					</thead>
					<!-- bucle -->
					@foreach ($consultorios as $con)
					<tr>
						<td>{{$con->numero}}</td>
						<td>{{$con->piso}}</td>
						<td>{{$con->sillas}}</td>
						<td>{{$con->estado}}</td>
						<td>
							<a href="{{URL::action('ConsultorioController@edit', $con->idconsultorio)}}"><button class="btn btn-info"> Editar</button></a>
							<a href="" data-target="#modal-delete-{{$con->idconsultorio}}" data-toggle="modal"><button class="btn btn-danger">Suspender</button></a>
						</td>
					</tr>
					@include('profesional.consultorio.modal')
					@endforeach
					
				</table>
				
			</div>
			{{$consultorios->render()}}
			
		</div>
	</div>
@endsection