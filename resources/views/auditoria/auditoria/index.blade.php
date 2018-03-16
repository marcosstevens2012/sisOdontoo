@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>LISTADO DE AUDITORIA DE TURNOS<a href="auditoria/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('auditoria.auditoria.search')
		</div>
	</div>
	

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table id="example1" class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Usuario</th>
						<th>Tabla</th>
						<th>Evento</th>
						<th>Valores</th>
						<th>Fecha y Hora</th>
					</thead>
					<!-- bucle -->
					@foreach ($auditoria as $aud)
					<tr>
						<td>{{$aud->iduser}}</td>
						<td>{{$aud->tabla}}</td>
						<td>{{$aud->evento}}</td>
						<td>{{$aud->newval}}</td>
						<td>{{$aud->fechahora}}</td>
					</tr>
					@include('auditoria.auditoria.modal')
					@endforeach
					
				</table>
				
			</div>
			{{$auditoria->render()}}
			
		</div>
	</div>

<script type="text/javascript">
$(document).ready(function(){
    $('#example1').DataTable();
});

</script>
@endsection