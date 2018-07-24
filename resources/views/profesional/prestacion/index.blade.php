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
				<table id="example1" class="table table-bordered table-striped">
					<thead style="background: #9BE2F3;">
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
			
			
		</div>

	</div>

	<script type="text/javascript">
$(document).ready(function() {
    $('#example1').DataTable( {
        "order": [[ 1, "desc" ]],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            
     }
    });
} );
</script>
@endsection


