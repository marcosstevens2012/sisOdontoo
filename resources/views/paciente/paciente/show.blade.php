@extends ('layouts.admin')
@section ('contenido')
	@if ($odontograma == null)
            <script>  
                 swal({
                  type: 'info',
                  title: 'No posee historial',//carga el titulo con lo q hay en el input notice
                  showConfirmButton:true,
                  confirmButtonText:"Aceptar",
                  width:"50%",
                  padding: '10em',
                  showLoaderOnConfirm: true,
                });

            </script>
            @endif
    <?php
		$profesional = $_GET['profesional'];
	?>
	<div class="row">

				<div class="col-lg-2 col-sm-4 col-md-4 col-xs-12">
					<div class="form-group">
						<label>Nombre y apellido</label>
						<p>{{$paciente->nombre}} {{$paciente->apellido}}</p>
					</div>
				</div>

				<div class="col-lg-2 col-sm-4 col-md-4 col-xs-12">
					<div class="form-group">
						<label>Obra Social</label>
						<p>{{$paciente->obrasocial}}</p>
					</div>
				</div>

				<div class="col-lg-2 col-sm-4 col-md-4 col-xs-12">
					<div class="form-group">
										<a href="https://localhost/APPODONTOGRAMA/view/?idpaciente={{$paciente->idpaciente}}&nombre={{$paciente->nombre}}&apellido={{$paciente->apellido}}&documento={{$paciente->documento}}&obrasocial={{$paciente->obrasocial}}&telefono={{$paciente->telefono}}&sangre={{$paciente->tipo_sangre}}&nacimiento={{$paciente->nacimiento}}&profesional={{$profesional}}"><button class="btn btn-success btn-md">Ver Odontograma</button></a>
					</div>
				</div>	
				<div class="col-lg-2 col-sm-4 col-md-4 col-xs-12">
					<div class="form-group">
						<label>Numero de Carnet</label>
						<p>{{$paciente->obrasocial}}</p>
					</div>
				</div>
				
				<div class="col-lg-2 col-sm-4 col-md-4 col-xs-12">
					<div class="form-group">
						<label>Tipo Sangre</label>
						<p>{{$paciente->tipo_sangre}}</p>
					</div>
				</div>

				<div class="col-lg-2 col-sm-4 col-md-4 col-xs-12">
					<div class="form-group">
						<label>Alertas Medicas</label>
						<p>{{$paciente->contradicciones}}</p>
					</div>
				</div>

				
				<div class="col-lg-2 col-sm-4 col-md-4 col-xs-12">
									<div class="form-group">
						<label>Fecha de Nacimiento</label>
						<p><?php 
												$originalDate = $paciente->nacimiento;
        										$newDate = date("d-m-Y", strtotime($originalDate));
											?>{{$newDate}}</p>
					</div>
				</div>

				<div class="col-lg-2 col-sm-4 col-md-4 col-xs-12">
					<div class="form-group">
						<label>Telefono</label>
						<p>{{$paciente->telefono}}</p>
					</div>
				</div>

				<div class="col-lg-2 col-sm-4 col-md-4 col-xs-12">
					<div class="form-group">
						<label>Email</label>
						<p>{{$paciente->email}}</p>
					</div>
				</div>



				<div class="col-lg-2 col-sm-4 col-md-4 col-xs-12">
					<div class="row">
						<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
							<div class="form-group ">
								<label>Foto de Perfil</label>	
								<img src="{{asset('imagenes/articulos/'.$paciente->imagen)}}" alt="{{$paciente->nombre}}" width="500" class="img-responsive">
							</div>
						</div>
					</div>		
				</div>	
</div>
				<div class="row">
							<div class="panel panel-primary">
								<div class="panel-body">
									<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
										<table title="Listado de tratamientos" id="detalles" class="table table-striped table-bordered table-condensed">
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




				<div>
					<a href="/paciente/paciente"><button class="btn btn-danger btn-md">Volver</button></a>
				</div>
			
			
		
		
	</div>

@endsection