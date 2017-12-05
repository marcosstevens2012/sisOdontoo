@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo ingreso</h3>
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
	{!! Form::open(array('url'=>'insumo/ingreso', 'method'=>'POST', 'autocomplete'=>'off'))!!}
	{{Form::token()}}
	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="proveedor">Proveedor</label>
				
				<select name="idproveedor" id="idproveedor" class="form-control selectpicker" data-live-search="true">
				@foreach($personas as $persona)
					<option value="{{$persona->idproveedor}}">{{$persona->nombre . " " . $persona->apellido}}</option>
				@endforeach	
				</select>
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label>Tipo comprobante</label>
				<select name="tipo_comprobante" class="form-control selectpicker">
					<option value="Boleta">Boleta</option>
					<option value="Factura">Factura</option>
					<option value="Ticket">Ticket</option>
				</select>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="serie_comprobante">Serie Comprobante</label>
				<input type="number" name="serie_comprobante"  value="{{old('serie_comprobante')}}" class="form-control" placeholder="Serie Comprobante" pattern="[A-Za-z]{4-16}">
			</div>
		</div>
		
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="num_comprobante">Número Comprobante</label>
				<input type="number" name="num_comprobante"  value="{{old('num_comprobante')}}" class="form-control" placeholder="Numero Comprobante" pattern="[A-Za-z]{4-16}">
			</div>
		</div>
	</div>
		
	<div class="row">
		<div class="panel panel-primary">
			<div class="panel-body">
				<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
					<div class="form-group">
						<label>Artículo</label>
						<select name="pidinsumo" id="pidinsumo" class="form-control selectpicker" data-live-search="true">
							@foreach($insumos as $insumo)
								<option value="{{$insumo->idinsumo}}">{{$insumo->insumo}}</option>
							@endforeach	
						</select>
					</div>
				</div>

				<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
					<div class="form-group">
						<label for="cantidad">Cantidad</label>
						<input type="number" name="pcantidad" id="pcantidad" class="form-control " placeholder="cantidad">
					</div>
				</div>

				<div class="col-lg-2 col-sm-2 col-md-2 col-xs-2">
				<div class="form-group">
				<label>Medida</label>
						<select name="tipo_comprobante" class="form-control selectpicker">
						<option value="Boleta">Un</option>
						<option value="Factura">Lts</option>
						<option value="Ticket">Cm</option>
						</select>
					</div>
				</div>

				<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
					<label>Precio Compra $</label>
					<div class="input-group">
						<div class="input-group-addon">
                    		<i class="fa fa-usd"></i>
                  		</div>
						
						<input type="text" name="pprecio_compra" id="pprecio_compra" class="form-control" placeholder="Plus">
					</div>
				</div>

				<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
					<label>Precio Salida $</label>
					<div class="input-group">
						<div class="input-group-addon">
                    		<i class="fa fa-usd"></i>
                  		</div>
						
						<input type="text" name="pprecio_venta" id="pprecio_venta" class="form-control" placeholder="Plus">
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
							<th>Insumo</th>
							<th>Cantidad</th>
							<th>Precion compra</th>
							<th>Precio Salida</th>
							<th>subtotal</th>
						</thead>
						<tfoot>
							<th>Total</th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th><h4 id="total"> 0.00</h4></th>
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


	<script src="{{asset('js/jQuery-3.1.1.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/jquery-3.2.0.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.mask.min.js')}}"></script>
	

	<script type="text/javascript">
		$(document).ready(function($){
			$('#pprecio_compra').mask("#.##0,00", {reverse: true});
			$('#pprecio_venta').mask("#.##0,00", {reverse: true});
		})
	</script>


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

		function agregar(){
			idinsumo = $('#pidinsumo').val();
			insumo = $('#pidinsumo option:selected').text();
			cantidad = $('#pcantidad').val();
			precio_compra = $('#pprecio_compra').val();
			precio_venta = $('#pprecio_venta').val();
			if(idinsumo !="" && cantidad !="" && precio_compra != "" && precio_venta != ""){
				subtotal[cont]=(parseFloat(cantidad) * parseFloat(precio_compra));
				total = total + subtotal[cont];
				var fila = '<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+')" >X</button></td><td><input type="hidden" name="idinsumo[]" value="'+idinsumo+'">'+insumo+'</td><td><input type="number" name="cantidad[]" value="'+cantidad+'"></td><td><input type="text" name="precio_compra[]" value="'+precio_compra+'"></td><td><input type="text" name="precio_venta[]" value="'+precio_venta+'"></td><td>'+subtotal[cont]+'</td></tr>';
				cont++;
				limpiar();
				$('#total').html("$ " + parseFloat(total));
				evaluar();
				$('#detalles').append(fila);
			}else{
				alert("Error al ingresar el detalle del ingreso, revise los datos del insumo");
			}


		}
		function limpiar(){
			$('#pcantidad').val("");
			$('#pprecio_compra').val("");
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
			$("#fila" + index).remove();
			evaluar();
		}
	</script>
	@endpush

@endsection