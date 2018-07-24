@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="proveedor">Paciente</label>
				<p>{{$paciente->nombre . " " . $paciente->apellido}}</p>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label>Obra Social</label>
				<p>{{$paciente->obrasocial}}</p>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="serie_comprobante">Tipo Sangre</label>
				<p>{{$paciente->tipo_sangre}}</p>
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="serie_comprobante">Carnet</label>
				<p>{{$paciente->carnet}}</p>
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="serie_comprobante">Alertas</label>
				<p>{{$paciente->contradicciones}}</p>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="serie_comprobante">Saldo</label>
				<p>{{$paciente->saldo}}</p>
			</div>
		</div>
		
	</div>
		
	<div class="row">
		<div class="panel panel-primary">
			<div class="panel-body">
				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
					<table id="detalles" class="table table-striped table-bordered table-condensed">
						<thead style="background-color: #ccc">
							<th>Tratamiento</th>
							<th>Fecha</th>
						</thead>
						<tfoot>
							<th></th>
							<th></th>
						</tfoot>
						<tbody>
							@foreach($odontograma as $odo)
							<tr>
								<td>{{$odo->estados}}</td>
								<td>{{$odo->fechaRegistro}}</td>
							
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
			
		</div>
		
	</div>

@endsection