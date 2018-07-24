@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva Obra Social</h3>
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
	{!! Form::open(array('url'=>'paciente/obrasocial', 'method'=>'POST', 'autocomplete'=>'off', 'files'=>'true'))!!}
	{{Form::token()}}
	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" style="text-transform:uppercase;" onkeyup="aMays(event, this); this.value=this.value.replace(/[^a-zA-Z]/g,'');" required value="{{old('nombre')}}" class="form-control" placeholder="Nombre">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="Numero">Numero</label>
				<input type="number" name="numero" id="numero" required value="{{old('numero')}}" class="numero form-control" placeholder="Numero" maxlength="20">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="stock">Telefono</label>
				<input type="tel" name="telefono" id="telefono" required value="{{old('telefono')}}" class="telefono form-control" placeholder="Telefono">
			</div>
			
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="stock_min">Email</label>
				<input type="mail" name="email" required value="{{old('email')}}" class="form-control" placeholder="Email">
			</div>
		</div>
		<div class="row">
            <div class="col-md-12">   
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Seleccione Prestaciones</h3>                
                    </div>
                      
                <div class="panel-body">
				<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
					<div class="form-group">
						<label>Prestacion</label>
						<select name="pidprestacion" id="pidprestacion" class="form-control selectpicker" data-live-search="true">
								<option>Seleccione Prestacion</option>
							@foreach($prestaciones as $pre)
								<option value="{{$pre->idprestacion}}">{{$pre->nombre}}</option>
							@endforeach
						</select>
					</div>
				</div>

				<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
					<div class="form-group">
						<label name="importe" for="importe">Importe<i class="fa fa-usd" aria-hidden="true"></i></label>
						<input type="text" class="pcoseguro form-control" name="pcoseguro" id="pcoseguro" placeholder="Conseguro"  value="{{old('conseguro')}}"/>
					</div>
				</div>

				<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
					<div class="form-group">
						<label name="codigo" for="coseguro">Codigo</label>
						<input type="text" class="pcodigo form-control" name="pcodigo" id="pcodigo" placeholder="Codigo"  value="{{old('codigo')}}"/>
					</div>
				</div>

				<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
							<div class="form-group">
								<button type="button" id="bt_add" style="margin-top: 25px " class="btn btn-primary btn-lg btn-block">Agregar</button>
							</div>
						</div>

					<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
							<table id="detalles" class="table table-striped table-bordered table-condensed">
								<thead style="background-color: #ccc">
									<th>Opciones</th>
									<th>Prestacion</th>
									<th>Coseguro</th>
									<th>Codigo</th>	
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
				</div>
			</div>
		</div>
		</div>

		<div class="col-md-6 col-md-offset-3">
			<div class="col-md-6 col-md-offset-3">
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
		</div>
		</div>


	</div>
	{!!Form::close() !!}
<script type="text/javascript" src="{{asset('js/jquery-3.2.0.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.mask.min.js')}}"></script>

<script type="text/javascript">
	//MASCARAS PARA LOS INPUTS
$(document).ready(function($){
		$('.numero').mask("99999999", {reverse: true});
		$('.pcoseguro').mask("#.##0,00", {reverse: true});
		$(".pcodigo").mask("9999");
		$(".telefono").mask("9999-999999");
		
	})
</script>

<script type="text/javascript">

function aMays(e, elemento) {
tecla=(document.all) ? e.keyCode : e.which; 
 elemento.value = elemento.value.toUpperCase();
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
			idprestacion = $('#pidprestacion').val();
			prestacion = $('#pidprestacion option:selected').text();
			coseguro = $('#pcoseguro').val();
			codigo = $('#pcodigo').val();
			
			
			if(idprestacion !="" && coseguro !="" && codigo != ""){
				
				var fila = '<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+')" >X</button></td><td><input type="hidden" name="idprestacion[]" value="'+idprestacion+'">'+prestacion+'</td><td><input type="text" name="coseguro[]" value="'+coseguro+'"></td><td><input type="text" name="codigo[]" value="'+codigo+'"></td></tr>';
				cont++;
				limpiar();
				
				
				$('#detalles').append(fila);
			}else{
				alert("Error al ingresar el detalle del ingreso, revise los datos del prestacion");
			}


		}
		function limpiar(){
			$('#pcoseguro').val("");
			$('#pcodigo').val("");
			$('#pprecio_venta').val("");
			
		}

		
		function eliminar(index){
			
			$("#fila" + index).remove();
			
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
@endsection