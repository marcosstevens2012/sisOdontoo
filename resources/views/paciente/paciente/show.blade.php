@extends ('layouts.admin')
@section ('contenido')

	<div class="row">
		
			
				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
					<table id="detalles" class="table table-striped table-bordered table-condensed">
						<thead style="background-color: #ccc">
							<th>Nombre</th>
							<th>Apellido</th>
							<th>Nacimiento</th>
							<th>Sangre</th>
							<th>Obra Social</th>
							<th>Observaciones</th>
						</thead>
						<tfoot>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
						</tfoot>
						<tbody>
							
							<tr>
								
								<td>{{$paciente->nombre}}</td>
								<td>{{$paciente->apellido}}</td>
								<td align="center"> <?php 
												$originalDate = $paciente->nacimiento;
        										$newDate = date("d-m-Y", strtotime($originalDate));

											?>{{$newDate}}</td>
								<td>{{$paciente->tipo_sangre}}</td>			
								<td>{{$paciente->obrasocial}}</td>
								<td>{{$paciente->contradicciones}}</td>
							</tr>
							
						</tbody>
					</table>
					<a href="https://localhost/APPODONTOGRAMA/view/?idpaciente={{$paciente->idpaciente}}&nombre={{$paciente->nombre}}&apellido={{$paciente->apellido}}&documento={{$paciente->documento}}&obrasocial={{$paciente->obrasocial}}&telefono={{$paciente->telefono}}&sangre={{$paciente->tipo_sangre}}&nacimiento={{$paciente->nacimiento}}"><button class="btn .btn.bg-maroon">Odontograma</button></a>
				</div>
			
			
		
		
	</div>

@endsection