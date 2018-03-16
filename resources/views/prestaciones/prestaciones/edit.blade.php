@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<h3>Editar prestacion</h3>
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
	{!!Form::model($prestacion, ['method'=>'PATCH', 'route'=>['prestaciones.prestaciones.update', $prestacion->idprestacionprof],'files'=>'true'])!!}
	{{Form::token()}}
	<div class="row">
		<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
					<div class="form-group">
						<label for="precio_compra">Importe</label>
						<input type="double" name="pplus" id="pplus" class="form-control" placeholder="Plus" value="{{$prestacion->coseguro}}">
					</div>
				</div>

				<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
					<div class="form-group">
						<label name="tiempo" for="tiempo">Codigo</label>
						<input type="text" class="form-control timepicker" onBlur="CheckTime(this)" name="ptiempo" id="ptiempo" placeholder="Tiempo" value="{{$prestacion->codigo}}"> 

					</div>
				</div>
	</div>

	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<button class="btn btn-primary"  type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
		</div>

	</div>

	{!!Form::close() !!}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
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
		$('#pidinsumo').change(mostrarValores);
		$('#guardar').hide();
		
		
		function mostrarValores(){
			datosArticulo = document.getElementById('pidinsumo').value.split('_');
			$('#pprecio_venta').val(datosArticulo[1]);
			
		}


		function agregar(){
			datosArticulo = document.getElementById('pidinsumo').value.split('_');

			idarticulo =datosArticulo[0];
			console.log(idarticulo);
			articulo = $('#pidinsumo option:selected').text();
			cantidad = $('#pcantidad').val();
			precio_venta = $('#pprecio_venta').val();
			
			console.log('c..'+cantidad);
			
			if(idarticulo !="" && cantidad !=""  && precio_venta != ""){

					subtotal[cont]=(cantidad * precio_venta);
					total = total + subtotal[cont];
					var fila = '<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+')" >X</button></td><td><input type="hidden" name="idarticulo[]" value="'+idarticulo+'">'+articulo+'</td><td><input type="number" name="cantidad[]" value="'+cantidad+'"></td><td><input type="number" name="precio_venta" value="'+precio_venta+'"></td><td>'+subtotal[cont]+'</td></tr>';
					cont++;
					limpiar();
					$('#total').html("$ " + total);
					$('#total_venta').val(total)
					evaluar();
					$('#detalles').append(fila);
				}
				
			else{
				alert("Error al ingresar el detalle de la prestacion, revise los datos");
			}


		}
		function limpiar(){
			$('#pcantidad').val("");

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

<script type="text/javascript">
	function CheckTime(str) 
			{ 
			hora=str.value; 
			if (hora=='') { 
			return; 
			} 
			if (hora.length>8) { 
			alert("Introdujo una cadena mayor a 8 caracteres"); 
			return; 
			} 
			if (hora.length!=5) { 
			alert("Introducir HH:MM"); 
			return; 
			} 
			a=hora.charAt(0); //<=2 
			b=hora.charAt(1); //<4 
			c=hora.charAt(2); //: 
			d=hora.charAt(3); //<=5 
			e=hora.charAt(5); //: 
			f=hora.charAt(6); //<=5 
			if ((a==2 && b>3) || (a>2)) { 
			alert("El valor que introdujo en la Hora no corresponde, introduzca un digito entre 00 y 23"); 
			return; 
			} 
			if (d>5) { 
			alert("El valor que introdujo en los minutos no corresponde, introduzca un digito entre 00 y 59"); 
			return; 
			} 
			if (f>5) { 
			alert("El valor que introdujo en los segundos no corresponde"); 
			return; 
			} 
			if (c!=':') { 
			alert("Introduzca el caracter ':' para separar la hora, los minutos y los segundos"); 
			return; 
			} 
			} 

</script> 

<script type="text/javascript">




function aMays(e, elemento) {
tecla=(document.all) ? e.keyCode : e.which; 
 elemento.value = elemento.value.toUpperCase();
}

</script>


@endsection

