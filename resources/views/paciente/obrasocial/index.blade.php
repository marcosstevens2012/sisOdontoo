@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Obras Sociales <a href="obrasocial/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('paciente.obrasocial.search')
		</div>
	</div>

	@if(Session::has('notice'))<!-- crea una alerta de q ha sido creado correctamente el usuario-->
   					<div class="alert alert-info">
   					<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    				<strong>Notice:</strong> {{Session::get('notice') }}</div>
    @endif
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table  id="example1" class="table table-striped table-bordered table-condensed table-hover">
					<thead style="background: #9BE2F3;">
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
							<a href="{{URL::action('PrestacionObrasocialController@index', ['idobrasocial'=>$obr->idobrasocial])}}"><button class="btn .btn.bg-maroon">Prestaciones</button></a>
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