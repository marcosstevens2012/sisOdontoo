@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>NUEVO TURNO</h3>
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
	{!! Form::open(array('url'=>'turno/turno', 'method'=>'POST', 'autocomplete'=>'off', 'files'=>'true'))!!}
	{{Form::token()}}

		@if(Session::has('notice'))<!-- crea una alerta de q ha sido creado correctamente el turno-->
                
   					<div class="alert alert-info">{{ Session::get('notice') }}</div>
				
        @endif

		<div class="row">
		<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
			<div class="form-group ">
				<label clas=>Paciente</label>
				<select name="idpaciente" id="idpaciente" class="idpaciente form-control">
					<option>Seleccione Paciente</option>
					@foreach($personas as $per)
						<option value="{{$per->idpaciente}}">{{$per->apellido . " " . $per->nombre . " " . $per->documento}}</option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
			<div class="form-group ">
				<label clas=>Profesional</label>
				<select name="idprofesional" id="idprofesional" class="idprofesional form-control ">
					<option>Seleccione Profesional</option>
					@foreach($profesionales as $pro)
						<option value="{{$pro->idprofesional}}_{{$pro->consultorio}}">{{$pro->apellido . " " . $pro->nombre}}</option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
			<div class="form-group">
				<label for="fecha">Fecha </label> 
				<input type="date" id="fecha" name="fecha" class="fecha form-control" data-date-format="mm/dd/yyyy" min="{{$fechamax}}">
			</div>
		</div>

		<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
			<div class="form-group">
				<label for="fecha">Hora Inicio </label>
				<select name="hora_inicio" id="hora_inicio" class="hora_inicio form-control">
				</select>
			</div>
		</div>

		

		<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
			<div class="form-group">
				<label>Prestacion/Tratamiento</label>
				<select name="idprestacion" id="idprestacion" class="idprestacion form-control">
					<option>Seleccione</option>
					@foreach($prestaciones as $pre)
					<option value="{{$pre->idprestacion}}_{{$pre->tiempo}}">{{$pre->nombre . " " . $pre->tiempo}}</option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
			<div class="form-group">
				<label for="fecha">Tiempo</label>
				<input name="ptiempo" id="ptiempo" readonly class="ptiempo form-control">
			</div>
		</div>

		<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
			<div class="form-group">
				<label for="fecha">Hora Fin</label>
				<input name="hora_fin" id="hora_fin" readonly class="hora_fin form-control">
				
			</div>
		</div>

		<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
					<div class="form-group">
						<label for="Consultorio">Consultorio</label>
						<input type="num" name="consultorio" id="consultorio" autocomplete="consultorio" readonly class="form-control" placeholder="Consultorio">
					</div>
		</div>
		
		<input type="num" name="profesional" id="profesional" style="visibility: hidden;" readonly class="form-control" placeholder="Consultorio">
		<input type="num" name="paciente" id="paciente" style="visibility: hidden;" readonly class="form-control" placeholder="Consultorio">
		
		<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
			<div class="form-group">
				<label for="observaciones">Observaciones</label>
				<textarea name="observaciones" required value="{{old('observaciones')}}" class="form-control" rows="5" cols="10" placeholder="Observaciones" required> </textarea>
			</div>
		</div>
		

		
		<div class="col-md-6 col-md-offset-3">
			<div class="col-md-6 col-md-offset-3">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
		</div>


	</div>
	{!!Form::close() !!}

	@push ('scripts') 
	<!-- Trabajar con el script definido en el layout-->
	

	


	<script type="text/javascript">
	function CheckTime(str) 
			{ 
			hora=str.value; 
			if (hora=='') { 
			return; 
			} 
			if (hora.length>8) { 
			swal("Introdujo una cadena mayor a 8 caracteres"); 
			return; 
			} 
			if (hora.length!=5) { 
			swal("Introducir HH:MM"); 
			return; 
			} 
			a=hora.charAt(0); //<=2 
			b=hora.charAt(1); //<4 
			c=hora.charAt(2); //: 
			d=hora.charAt(3); //<=5 
			e=hora.charAt(5); //: 
			f=hora.charAt(6); //<=5 
			if ((a==2 && b>3) || (a>2)) { 
			swal("El valor que introdujo en la Hora no corresponde, introduzca un digito entre 00 y 23"); 
			return; 
			} 
			if (d>5) { 
			swal("El valor que introdujo en los minutos no corresponde, introduzca un digito entre 00 y 59"); 
			return; 2
			} 
			if (f>5) { 
			s("El valor que introdujo en los segundos no corresponde"); 
			return; 
			} 
			if (c!=':') { 
			swal("Introduzca el caracter ':' para separar la hora, los minutos y los segundos"); 
			return; 
			} 
			} 

</script> 

<script type="text/javascript">
    $(document).ready(function(){

        $(document).on('change','.idprestacion',function(e){
        	e.stopPropagation();
            console.log("hmm its change");

            datosPrestacion = document.getElementById('idprestacion').value.split('_');
			datosProfesional = document.getElementById('idprofesional').value.split('_');
			datosPaciente = document.getElementById('idpaciente').value.split('_');
			
			
			$('#ptiempo').val(datosPrestacion[1]);
			$('#consultorio').val(datosProfesional[1]);
			$('#profesional').val(datosProfesional[0]);
			$('#paciente').val(datosPaciente[1]);



			inicio = $('#hora_inicio option:selected').text();
			fin = document.getElementById("ptiempo").value;
			console.log(inicio);

			  
			  inicioMinutos = parseInt(inicio.substr(3,2));
			  inicioHoras = parseInt(inicio.substr(0,2));
			  console.log(inicioMinutos);
			  console.log(inicioHoras);
			  
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

            datosPrestacion = document.getElementById('idprestacion').value.split('_');
            idprestacion = datosPrestacion[0];

            var div=$(this).parent();

            var op=" ";
            console.log(idprestacion);
                
            $.ajax({
                type:'get',
                url:'{!!URL::to('buscarStock')!!}',
                data:{'id':idprestacion},
                headers:{'X-CSFR-TOKEN':$('meta[name="csrf-token"]').attr('content')},
                success:function(data){
               	 	console.log('success');

                    console.log(data);
                    value = data.stock;
                    min= data.stock_min;
                    console.log(value);
                    console.log(min);
                    if ((value<min)) { 
					swal("ALERTA: Stock Insuficiente:" + " " + value); 
					return; 
					}            
                  
                },
                error:function(){

                }
            });

        });

    });
</script>


<script type="text/javascript">
    $(document).ready(function(){

        $(document).on('change','.idpaciente',function(e){
        	e.stopPropagation();
            console.log("hmm its change");

            var idpaciente=$(this).val();
            var div=$(this).parent();
            console.log(idpaciente);

            $.ajax({
                type:'get',
                url:'{!!URL::to('buscarSaldo')!!}',
                data:{'id':idpaciente},
                headers:{'X-CSFR-TOKEN':$('meta[name="csrf-token"]').attr('content')},
                success:function(data){
               	 	console.log('success');

                    console.log(data);
                    value = data.saldo;
                    alerta = data.contradicciones;
                    console.log("change");
                    if ((data.saldo>'0')) { 
					swal("Paciente con saldo" + " $ " + value,
					 	"ALERTA:" + alerta);
					}
					else if((data.contradicciones != '')){
					 	swal("ALERTA:" + alerta);
					 	}
					return;
					},           
                
                error:function(){

                }
            });

        });

    });
</script>

<script type="text/javascript">
    $(document).ready(function(){

        $(document).on('focusout','.fecha',function(){
            console.log("hmm its change");


            datosProfesional = document.getElementById('idprofesional').value.split('_');
            $('#profesional').val(datosProfesional[0]);
            var fecha=$(this).val();
            var profesional=$('#profesional').val();
            console.log(fecha);
            console.log(profesional);
            
            var div=$(this).parent();
            $('#hora_inicio').empty();
            //$('hora_inicio').empty().append('whatever');
            var op=" ";
            
            $.ajax({
                type:'get',
                url:'{!!URL::to('buscarHorario')!!}',
                data:{'idprofesional': profesional, 'fecha': fecha},
                headers:{'X-CSFR-TOKEN':$('meta[name="csrf-token"]').attr('content')},
                success:function(data){
                		console.log('success');
               			console.log(data);

						$.each(data, function (i, item) {
						    $('#hora_inicio').append($('<option>', { 
						        value: item.hora,
						        text : item.hora 
						    }));
						    console.log(item.idhorario);
						});          
                },
                error:function(){
                }
            });

        });
     });  

</script> 

<script>
		
		$(document).ready(function() {

	    $('.hora_inicio').select2({
       		theme: "bootstrap"
    	});

    	$('.idprofesional').select2({
       		theme: "bootstrap"
    	});

    	$('.idprestacion').select2({
       		theme: "bootstrap"
    	});
	    
	    $('.idpaciente').select2({
       		theme: "bootstrap"
    	});
	});
</script>




	@endpush
@endsection