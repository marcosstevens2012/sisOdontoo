@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Trasacciones <a href="transaccion/create"><button class="btn btn-success">Nuevo</button><button class="btn btn-info">Reporte</button></a></h3>
			@include('transaccion.transaccion.search')
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Fecha</th>
						<th>Cliente</th>
						<th>Comprobante</th>
						<th>Total</th>
						<th>Estado</th>
						<th>Opciones</th>
					</thead>
					<!-- bucle -->
					@foreach ($transacciones as $ven)
					<tr>
						<td>{{$ven->fecha_hora}}</td>
						<td>{{$ven->nombre}}</td>
						<td>{{$ven->tipo_comprobante.': '.$ven->num_comprobante}}</td>
						<td>{{$ven->total_venta}}</td>
						<td>{{$ven->estado}}</td>
						<td>
							<a href="{{URL::action('TransaccionController@show', $ven->idventa)}}"><button class="btn btn-info"> Detalles</button></a>
							<a href="" data-target="#modal-delete-{{$ven->idtransaccion}}" data-toggle="modal"><button class="btn btn-danger"> Anular</button></a>
						</td>
					</tr>
					@include('transaccion.transaccion.modal')
					@endforeach
					
				</table>
				
			</div>
			{{$transacciones->render()}}
			
		</div>
	</div>
@endsection