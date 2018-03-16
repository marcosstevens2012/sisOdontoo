@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="cliente">Paciente Sin Obra Social</label>
				<p>{{$transaccion->nombre}} {{$transaccion->apellido}}</p>
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="fecha_hora">Fecha y Hora</label>
				<p>{{$transaccion->fecha_hora}}</p>
			</div>
		</div>
	</div>
		
	<div class="row">
		<div class="panel panel-primary">
			<div class="panel-body">
				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
					<table id="detalles" class="table table-striped table-bordered table-condensed">
						<thead style="background-color: #ccc">
							<th>Prestacion</th>
							<th>Coseguro</th>
							<th>Forma de Pago</th>
							<th>subtotal</th>
						</thead>
						<tfoot>
							<th></th>
							<th></th>
							<th></th>
							<th><h4 id="total">$ {{$transaccion->total_transaccion}}</h4></th>
						</tfoot>
						<tbody>
							@foreach($detalles as $det)
							<tr>
								<td>{{$det->prestacion}}</td>
								<td>$ {{$det->importe}}</td>
								<td>{{$det->pago}}
								<td>$ {{$det->importe}}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
			
		</div>
		
	</div>

@endsection