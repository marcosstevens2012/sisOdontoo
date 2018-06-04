@extends ('layouts.admin')
@section ('contenido')

	<?php
	$idpaciente = $_GET['idpaciente'];
	?>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>NUEVA TRANSACCION</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif
		</div>
	</div>
	{!! Form::open(array('url'=>'transaccion/transaccion', 'method'=>'POST', 'autocomplete'=>'off'))!!}
	{{Form::token()}}
	
						<input style="display:none;" type="number" name="idpaciente" id="idpaciente" class="form-control" placeholder="Paciente" value="{{$idpaciente}}"></label>
		
		
	<div class="row">
		<div class="panel panel-primary">
			<div class="panel-body">
				<div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
					<div class="form-group">
						<label>Prestacion</label>
						<select name="pidprestacion" id="pidprestacion" class="form-control selectpicker" data-live-search="true">
								<option>Seleccione</option>
							@foreach($prestaciones as $pre)
								
									<option value="{{$pre->idprestacion}}_{{$pre->coseguro}}">{{$pre->nombre}}</option>
								
							@endforeach	
						</select>
					</div>
				</div>
				
				<div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
					<div class="form-group">
						<label for="coseguro">Importe</label>
						<input type="number" name="pcoseguro" id="pcoseguro" class="form-control" placeholder="coseguro">
					</div>
				</div>

				<div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
					<div class="form-group">
						<label>Forma de Pago</label>
						<select name="pformapago" id="pformapago" class="form-control selectpicker" data-live-search="true">
								<option>Seleccione</option>
							@foreach($formapago as $for)
								<option value="{{$for->idformadepago}}">{{$for->tipo}}</option>
							@endforeach	
						</select>
					</div>
				</div>

				<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
					<div class="form-group">
						<button type="button" id="bt_add" class="btn btn-primary">Agregar</button>
					</div>
				</div>

				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
					<table id="detalles" class="table table-striped table-bordered table-condensed">
						<thead style="background-color: #ccc">
							<th>Opciones</th>
							<th>Prestacion</th>
							<th>Coseguro</th>
							<th>Forma de Pago</th>
							<th>Subtotal</th>
						</thead>
						<tfoot>
							<th>Total</th>
							<th></th>
							<th></th>
							<th></th>
							<th><h4 id="total"> 0.00</h4><input type="hidden" name="total_transaccion" id="total_transaccion"></th>
						</tfoot>
						<tbody>
						
						</tbody>
					</table>
				</div>
			</div>
			
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar">
			<div class="form-group">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
		</div>


	</div>
	{!!Form::close() !!}
	@push ('scripts') <!-- Trabajar con el script definido en el layout-->
	<script>
		$(document).ready(function(){
			$('#bt_add').click(function(){
				agregar();
			});
		});


		var cont=0;
		var total = 0;
		subtotal=[];
		$('#guardar').hide();
		
		$('#pidprestacion').change(mostrarValores);
		
		function mostrarValores(){
			datosprestacion = document.getElementById('pidprestacion').value.split('_');
			$('#pcoseguro').val(datosprestacion[1]);
		}


		function agregar(){
			datosprestacion = document.getElementById('pidprestacion').value.split('_');
			datosformapago = document.getElementById('pformapago').value.split('_');
			idprestacion = datosprestacion[0];
			idformadepago = datosformapago[0];
			prestacion = $('#pidprestacion option:selected').text();
			coseguro = $('#pcoseguro').val();
			formapago = $('#pformapago option:selected').text();
			subtotal[cont] = $('#pcoseguro').val();
			
			if(idprestacion !=""  && coseguro != ""){
					
					total = parseInt(total) + parseInt(subtotal[cont]);
					var fila = '<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+')" >X</button></td><td><input type="hidden" name="idprestacion[]" value="'+idprestacion+'">'+prestacion+'</td><td><input type="number" readonly name="coseguro[]" value="'+coseguro+'"></td><td><input type="hidden" name="formapago[]" value="'+idformadepago+'">'+formapago+'</td><td>'+subtotal[cont]+'</td></tr>';
					cont++;
					limpiar();
					$('#total').html("$ " + total);
					$('#total_transaccion').val(total);
					evaluar();
					$('#detalles').append(fila);
				
				
			}else{
				alert("Error al ingresar el detalle de la transaccion, revise los ddatos del prestacion");
			}


		}
		function limpiar(){
			$('#pcantidad').val("");
			$('#pcoseguro').val("");

		}

		function evaluar(){
			if (total>0) {
				$('#guardar').show();
			}
			else{
				$('#guardar').hide();
			}
		}
		function eliminar(index){
			total=total-subtotal[index];
			$("#total").html("$ " + total);
			$("#fila" + index).remove();
			evaluar();
		}
	</script>
	@endpush

@endsection