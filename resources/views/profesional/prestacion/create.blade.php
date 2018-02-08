@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva Prestacion</h3>
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
	{!! Form::open(array('url'=>'profesional/prestacion', 'method'=>'POST', 'autocomplete'=>'off', 'files'=>'true'))!!}
	{{Form::token()}}
		<div class="row">
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group ">
					<label> Nombre</label>
					<input class='form-control' style="text-transform:uppercase;" onkeyup="aMays(event, this)" onblur="aMays(event, this)" title="Se necesita un nombre" required value="{{old('nombre')}}" type="text" name="nombre" required/>

				</div>
			</div>

		

			<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
					<div class="form-group">
						<label name="tiempo" for="tiempo">Tiempo (hh:mm):</label>
						<input type="text" class="form-control timepicker" onBlur="CheckTime(this)" name="ptiempo" id="ptiempo" placeholder="Tiempo"> 
					</div>
			</div>
		</div>

		<div class="panel panel-primary">
			<div class="panel-body">

			<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
				<div class="form-group">
					<label>Insumo</label>
					<select name="pidinsumo" id="pidinsumo" class="form-control selectpicker" data-live-search="true">
						@foreach($insumos as $ins)
							<option value="{{$ins->idinsumo}}_{{$ins->precio_promedio}}">{{$ins->insumo}}</option>
						@endforeach
					</select>
				</div>
			</div>

			<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
				<div class="form-group">
					<label name="cantidad" for="cantidad">Cantidad:</label>
					<input type="number" class="form-control" name="pcantidad" id="pcantidad" placeholder="Cantidad"  value="{{old('cantidad')}}"/>
				</div>
			</div>

			<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
						<div class="form-group">
							<button type="button" id="bt_add" style="margin-top: 25px " class="btn btn-primary">Agregar</button>
						</div>
					</div>

				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
						<table id="detalles" class="table table-striped table-bordered table-condensed">
							<thead style="background-color: #ccc">
								<th>Opciones</th>
								<th>Insumo</th>
								<th>Cantidad</th>
							</thead>
							<tfoot>
								<th>Total</th>
								<th></th>
								<th></th>
							</tfoot>
							<tbody>
							
							</tbody>
						</table>
					</div>
			</div>
		</div>
		
		<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
			<div class="form-group">
				<label for="observaciones">Observaciones</label>
				<textarea name="observaciones" style="text-transform:uppercase;" onkeyup="aMays(event, this)" onblur="aMays(event, this)" id="observaciones"  class="form-control" required value="{{old('observaciones')}}" placeholder="Observaciones" required> </textarea>
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
			
		}


		function agregar(){
			datosArticulo = document.getElementById('pidinsumo').value.split('_');

			idarticulo =datosArticulo[0];
			console.log(idarticulo);
			articulo = $('#pidinsumo option:selected').text();
			cantidad = $('#pcantidad').val();
			
			console.log('c..'+cantidad);
			
			if(idarticulo !="" && cantidad !=""){
					var fila = '<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+')" >X</button></td><td><input type="hidden" name="idarticulo[]" value="'+idarticulo+'">'+articulo+'</td><td><input type="number" name="cantidad[]" value="'+cantidad+'"></td></tr>';
					cont++;
					limpiar();
				
					$('#detalles').append(fila);
				}
				
			else{
				alert("Error al ingresar el detalle de la prestacion, revise los datos");
			}


		}
		function limpiar(){
			$('#pcantidad').val("");
		}

		function eliminar(index){
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