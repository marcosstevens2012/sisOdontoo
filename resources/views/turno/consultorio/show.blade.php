@extends ('layouts.admin')
@section ('contenido')

	<div class="row">
		<div class="panel panel-primary">
			<div class="panel-body">
				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
					<table id="detalles" class="table table-striped table-bordered table-condensed">
						<thead style="background-color: #ccc">
							<th>Turno</th>
							<th>Estado</th>
							<th>Modificado</th>
							<th>Finalizado</th>
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
							@foreach($turno as $tur)
							<tr>
								<td>{{$tur->idturno}}</td>
								<td>{{$tur->estado}}</td>
								<td>{{$tur->inicio}}</td>
								<td>{{$tur->fin}}</td>
								<td>{{$tur->observaciones}}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
			
		</div>
		
	</div>

@endsection