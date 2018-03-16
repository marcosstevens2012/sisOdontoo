@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>LISTADO DE PRESTACIONES <a href="prestacion/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('profesional.prestacion.search')
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Nombre</th>
						<th>Opciones</th>
					</thead>
					<!-- bucle -->
					@foreach ($prestaciones as $pre)
					<tr>
						<td>{{$pre->nombre}}</td>
						<td>
							<a href="" data-target="#modal-delete-{{$pre->idprestacion}}" data-toggle="modal"><button class="btn btn-danger"> Eliminar</button></a>
						</td>
					</tr>
					@include('profesional.prestacion.modal')
					@endforeach
					
				</table>
				
			</div>
			{{$prestaciones->render()}}
			
		</div>

	</div>
@endsection