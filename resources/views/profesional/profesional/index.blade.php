@extends ('layouts.admin')
@section ('contenido')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Profesionales <a href="profesional/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('profesional.profesional.search')
		</div>
	</div>
	@if(Session::has('notice'))<!-- crea una alerta de q ha sido creado correctamente el usuario-->
   					<div class="alert alert-success">
   					<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    				<strong>Success!</strong> {{Session::get('notice') }}</div>
        @endif
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table id="example1" class= "table table-striped table-bordered table-condensed table-hover">
					<thead>
					
						<th>Nombre</th>
						<th>Apellido</th>
						<th>Documento</th>
						<th>Matricula</th>
						<th>Telefono</th>
						<th>Email</th>
						<th>Opciones</th>
					
					</thead>
					<tbody>
					<!-- bucle -->
					@foreach ($profesionales as $pro)
					<tr>
						<td style="text-align: center;">{{$pro->nombre}}</td>
						<td style="text-align: center;">{{$pro->apellido}}</td>
						<td style="text-align: center;">{{$pro->dni}}</td>
						<td style="text-align: center;">{{$pro->matricula}}</td>
						<td style="text-align: center;">{{$pro->telefono}}</td>
						<td style="text-align: center;">{{$pro->email}}</td>
						<td>
							<a href="{{URL::action('ProfesionalController@edit', $pro->idprofesional)}}"><button class="btn btn-info">Editar</button></a>
							<a href="{{URL::action('LiquidacionController@create', ['idprofesional'=>$pro->idprofesional])}}"><button class="btn .btn.bg-maroon">Liquidaciones</button></a>
							<a href="" data-target="#modal-delete-{{$pro->idprofesional}}" data-toggle="modal"><button class="btn btn-danger"> Eliminar</button></a>
						</td>
					</tr>
					
					@include('profesional.profesional.modal')
					@endforeach
					</tbody>
					
				</table>
				
			</div>
			{{$profesionales->render()}}
			
		</div>

	</div>
@push ('scripts')

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>


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

@endpush
@endsection