@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
			<h3>Editar Estado Turno {{$turno->hora_inicio}}</h3>
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
	{!!Form::model($turno, ['method'=>'PATCH', 'route'=>['turno.turno.update', $turno->idturno],'files'=>'true'])!!}
	{{Form::token()}}
	<div class="row">

		<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
			<div class="form-group ">
				<label value="{{$profesional->idprofesional}}">Profesional</label>
				<input readonly class='form-control' style="text-transform:uppercase;" required value="{{$profesional->profesional}}" type="text" id="profesional" name="profesional" required/>

			</div>
		</div>

		<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
			<div class="form-group ">
				<label value="{{$pacientes->idpaciente}}" >Paciente</label>
				<input readonly class='form-control' style="text-transform:uppercase;"  required value="{{$pacientes->paciente}}" type="text" name="apellido" id="paciente" required/>
			</div>
		</div>
		
		<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
			<div class="form-group ">
				<label clas=>Estado</label>
				<select name="estado" id="estado" class="form-control selectpicker" data-live-search="true">
						@foreach($estados as $est)
						<option value="{{$est->idestado_turno}}">{{$est->estado}}</option>
						@endforeach
				</select>
			</div>
		</div>

		<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
			<div class="form-group">
				<label for="observaciones">Observaciones</label>
				<textarea name="observaciones" required value="{{old('observaciones')}}" value="{{$turno->observaciones}}" class="form-control" rows="5" cols="10" placeholder="Observaciones" required>{{$turno->observaciones}}</textarea>
			</div>
		</div>
		
		
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="col-md-6 col-md-offset-3">
				<button class="btn btn-danger" type="reset">Volver</button>
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>

			</div>
		</div>
	</div>

	{!!Form::close() !!}

	@push ('scripts') 
	<!-- Trabajar con el script definido en el layout-->
	

	
	<script>

$(function() {
$('.').datepicker({
    startDate: '-3d'});
}
</script>

	<script>



		$(document).ready(function(){
			$('#bt_add').click(function(){
				agregar();
			});
		});
		$('#hora_inicio').change(mostrarValores);
		
		function mostrarValores(){
			datosPrestacion = document.getElementById('idprestacion').value.split('_');
			datosProfesional = document.getElementById('idprestacion').value.split('_');
			$('#ptiempo').val(datosPrestacion[1]);
			$('#costo').val("$ " +datosPrestacion[2]);
			$('#consultorio').val(datosProfesional[4]);
			$('#profesional').val(datosProfesional[3]);

			inicio = document.getElementById("hora_inicio").value;
			fin = document.getElementById("ptiempo").value;
			  
			  inicioMinutos = parseInt(inicio.substr(3,2));
			  inicioHoras = parseInt(inicio.substr(0,2));
			  
			  finMinutos = parseInt(fin.substr(3,2));
			  finHoras = parseInt(fin.substr(0,2));

			  transcurridoMinutos = finMinutos + inicioMinutos;
			  transcurridoHoras = finHoras + inicioHoras;
			  
			  if (transcurridoMinutos > 59) {
			    transcurridoHoras++;
			    transcurridoMinutos = transcurridoMinutos - 60 ;
			  }
			  
			  horas = transcurridoHoras.toString();
			  minutos = transcurridoMinutos.toString();
			  
			  if (horas.length < 2) {
			    horas = "0"+horas;
			  }
			  
			  if (minutos.length < 2) {
			    minutos = "0"+minutos;
			  }

			  document.getElementById("hora_fin").value = horas+":"+minutos;
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
		
			if(idinsumo !=""){
				var fila = '<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+')" >X</button></td><td><input type="hidden" name="idprestacion[]" value="'+idprestacion+'">'+prestacion+'</td></tr>';
				cont++;
				limpiar();
				evaluar();
				$('#detalles').append(fila);
				$('#guardar').show();
			}else{
				alert("Error al ingresar el detalle del ingreso, revise los datos del insumo");
			}


		}
		function eliminar(index){
			$("#fila" + index).remove();
			evaluar();
		}
	</script>

	@endpush

@endsection