@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>LISTADO DE INGRESOS <a href="ingreso/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('insumo.ingreso.search')
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table id="example1" class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Fecha</th>
						<th>Proveedor</th>
						<th>Comprobante</th>
						<th>Total</th>
						<th>Estado</th>
						<th>Opciones</th>
					</thead>
					<!-- bucle -->
					@foreach ($ingresos as $ing)
					<tr>
						<td>{{$ing->fecha_hora}}</td>
						<td>{{$ing->nombre}}</td>
						<td>{{$ing->tipo_comprobante.': '.$ing->serie_comprobante.'-'.$ing->num_comprobante}}</td>
						<td>{{ '$' . ' '. $ing->total}}</td>
						<td>{{$ing->estado}}</td>
						<td>
							<a href="{{URL::action('IngresoController@show', $ing->idingreso)}}"><button class="btn btn-info"> Detalles</button></a>
							<a href="" data-target="#modal-delete-{{$ing->idingreso}}" data-toggle="modal"><button class="btn btn-danger"> Anular</button></a>
						</td>
					</tr>
					@include('insumo.ingreso.modal')
					@endforeach
					
				</table>
				
			</div>
			{{$ingresos->render()}}
			
		</div>
	</div>

	<script type="text/javascript">
$(document).ready(function(){
    $('#example1').DataTable();
});

</script>
@endsection