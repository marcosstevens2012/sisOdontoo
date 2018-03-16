@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Asignar Prestaciones</h3>
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
	{!! Form::open(array('url'=>'prestaciones/prestaciones', 'method'=>'POST', 'autocomplete'=>'off', 'files'=>'true'))!!}
	{{Form::token()}}
		<div class="row">
		<div class="col-lg-12 col-xs-12">
			<h3>Prestaciones</h3>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<label for="fecha">Obra social</label>
			<div class="form-group">
				<select name="pobrasocial" id="pobrasocial" class="selectpicker form-control " data-live-search="true"  >
					<option >Seleccione obrasocial</option>
					@foreach($obrasocial as $pro)	
						<option value="{{$pro->idobrasocial}}">{{$pro->nombre . " " . $pro->apellido}}</option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<label for="fecha">Prestacion</label>
			<div class="form-group">
				<select name="pprestacion" id="pprestacion" class="selectpicker form-control " data-live-search="true"  >
					<option >Seleccione Prestacion</option>
					@foreach($prestacion as $pre)
						
						<option value="{{$pre->idprestacion}}">{{$pre->nombre}}</option>
						
					@endforeach
				</select>
			</div>
		</div>
		
				<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
					<div class="form-group">
						<label for="precio_compra">Importe</label>
						<input type="double" name="pplus" id="pplus" class="form-control" placeholder="Importe">
					</div>
				</div>

				<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
					<div class="form-group">
						<label name="tiempo" for="tiempo">Codigo</label>
						<input type="text" class="form-control timepicker" name="ptiempo" id="ptiempo" placeholder="Codigo"> 
					</div>
				</div>

				<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
					<div class="form-group">
						<button type="button" id="bt_add" style="margin-top: 25px;" class="btn btn-primary">Agregar</button>
					</div>
				</div>

				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
					<table id="detalles" class="table table-striped table-bordered table-condensed">
						<thead style="background-color: #ccc">
							<th>Opciones</th>
							<th>Prestacion</th>
							<th>Tiempo</th>
							<th>Plus</th>
						</thead>
						<tfoot>
							<th></th>
							<th></th>
							<th></th>
							
						</tfoot>
						<tbody>
						
						</tbody>
					</table>
				</div>
		
		<div class="col-md-6 col-md-offset-3">
			<div class="col-md-6 col-md-offset-3">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
		</div>

		

	</div>
	{!!Form::close() !!}
	

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

@push ('scripts') <!-- Trabajar con el script definido en el layout-->

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

	<script>
		$(document).ready(function(){
			$('#bt_add').click(function(){
				agregar();
			});
		});
		var cont=0;
	
		
		$('#guardar').hide();

		function agregar(){
			idprestacion = $('#pprestacion').val();
			prestacion = $('#pprestacion option:selected').text();
			tiempo = $('#ptiempo').val();
			plus = $('#pplus').val();
			if(tiempo !="" && plus !=""){
				var fila = '<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+')" >X</button></td><td><input type="hidden" name="prestacion[]" value="'+idprestacion+'">'+prestacion+'</td><td><input type="number" name="tiempo[]" value="'+tiempo+'"></td><td><input type="number" name="plus[]" value="'+plus+'"></td></tr>';
				cont++;
				limpiar();
				$('#detalles').append(fila);
			}else{
				alert("Error al ingresar el horario, revise los datos");
			}


		}
		function limpiar(){
			$('#tiempo').val("");
			$('#hora_salida').val("");
		
		}


		function eliminar(index){
			total=total-subtotal[index];
			$("#total").html("$ " + total);
			$("#fila" + index).remove();
			evaluar();
		}
	</script>

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
	@endpush

<script type="text/javascript">




function aMays(e, elemento) {
tecla=(document.all) ? e.keyCode : e.which; 
 elemento.value = elemento.value.toUpperCase();
}

</script>

@endsection