@extends ('layouts.admin')
@section ('contenido')
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
	{!! Form::open(array('url'=>'ventas/venta', 'method'=>'POST', 'autocomplete'=>'off'))!!}
	{{Form::token()}}
	<div class="row">
		<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
			<div class="form-group">
				<label for="cliente">Paciente</label>
				
				<select name="idcliente" id="idcliente" class="form-control selectpicker" data-live-search="true">
				@foreach($personas as $persona)
					<option value="{{$persona->idpersona}}">{{$persona->nombre ." ". $persona->apellido}}</option>
				@endforeach	
				</select>
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label>Tipo comprobante</label>
				<select name="tipo_comprobante" class="form-control">
					<option value="Boleta">Boleta</option>
					<option value="Factura">Factura</option>
					<option value="Ticket">Ticket</option>
				</select>
			</div>
		</div>

		
		
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="num_comprobante">Número Comprobante</label>
				<input type="text" name="num_comprobante"  value="{{old('num_comprobante')}}" class="form-control" placeholder="Numero Comprobante">
			</div>
		</div>
	</div>
		
	<div class="row">
		<div class="panel panel-primary">
			<div class="panel-body">
				<div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
					<div class="form-group">
						<label>Prestacion</label>
						<select name="pidprestacion" id="pidprestacion" class="form-control selectpicker" data-live-search="true">
								<option>Seleccione</option>
							@foreach($prestaciones as $pre)
								<option value="{{$pre->idprestacion}}_{{$pre->costo}}">{{$pre->nombre . " " . $pre->costo}}</option>
							@endforeach	
						</select>
					</div>
				</div>
				
				<div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
					<div class="form-group">
						<label for="descuento">Descuento Obra Social</label>
						<input type="number" name="pdescuento" id="pdescuento" class="form-control" placeholder="Descuento">
					</div>
				</div>

				<div class="col-lg-3 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label>Forma de Pago</label>
						<select name="pidprestacion" id="pidprestacion" class="form-control selectpicker" data-live-search="true">
							@foreach($formapago as $for)
								<option value="{{$for->idformadepago}}">{{$for->nombre}}</option>
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
							<th>Descuento</th>
							<th>subtotal</th>
						</thead>
						<tfoot>
							<th>Total</th>
							<th></th>
							<th></th>
			
							
							<th><h4 id="total"> 0.00</h4><input type="hidden" name="total_venta" id="total_venta"></th>
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
		c
		
		function mostrarValores(){
			datosArticulo = document.getElementById('pidprestacion').value.split('_');
			$('#pprecio_venta').val(datosArticulo[1]);
		}


		function agregar(){
			datosArticulo = document.getElementById('pidprestacion').value.split('_');

			idprestacion = datosArticulo[0];
			console.log(idprestacion);
			articulo = $('#pidprestacion option:selected').text();
			descuento = $('#pdescuento').val();
			precio_venta = $('#pprecio_venta').val();
			if(idprestacion !=""  && descuento != "" && precio_venta != ""){
				if(cantidad >= stock){
					subtotal[cont]=(cantidad * precio_venta - descuento);
					total = total + subtotal[cont];
					var fila = '<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+')" >X</button></td><td><input type="hidden" name="idprestacion[]" value="'+idprestacion+'">'+articulo+'</td><td><td><input type="number" name="descuento[]" value="'+descuento+'"></td><td><input type="number" name="precio_venta[]" value="'+precio_venta+'"></td><td>'+subtotal[cont]+'</td></tr>';
					cont++;
					limpiar();
					$('#total').html("$ " + total);
					$('#total_venta').val(total)
					evaluar();
					$('#detalles').append(fila);
				}
				else{
					alert('La cantidad es mayor que el stock');
				}
				
			}else{
				alert("Error al ingresar el detalle de la venta, revise los ddatos del articulo");
			}


		}
		function limpiar(){
			$('#pcantidad').val("");
			$('#pdescuento').val("");
			$('#pprecio_venta').val("");
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
			$("#total_venta").val(total);
			$("#fila" + index).remove();
			evaluar();
		}
	</script>
	@endpush

@endsection