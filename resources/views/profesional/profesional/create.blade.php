@extends ('layouts.admin')


@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Profesional</h3>
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
	{!! Form::open(array('url'=>'profesional/profesional', 'method'=>'POST', 'autocomplete'=>'off', 'files'=>'true'))!!}
	{{Form::token()}}
	@if(Session::has('notice'))<!-- crea una alerta de q ha sido creado correctamente el usuario-->
                
   					<div class="alert alert-info">{{ Session::get('notice') }}</div>
				
        @endif

		<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group ">
				<label> Nombre</label>
				<input class='form-control' style="text-transform:uppercase;" onkeyup="aMays(event, this)" onblur="aMays(event, this)" title="Se necesita un nombre" required value="{{old('nombre')}}"type="text" name="nombre" required/>

			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group ">
				<label>Apellido</label>
				<input class='form-control' style="text-transform:uppercase;" onkeyup="aMays(event, this)" onblur="aMays(event, this)" title="Se necesita un Apellido" required value="{{old('Apellido')}}" type="text" name="apellido" required/>

			</div>
		</div>

		<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
			<div class="form-group">
				<label>Tipo Documento</label>
				<select name="idtipo_documento" id="idtipo_documento" class="idtipo_documento form-control" >
					@foreach($tipodocumentos as $doc)
						<option value="{{$doc->idtipo_documento}}">{{$doc->nombre}}</option>
					@endforeach
				</select>
			</div>
		</div>
		
		<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
			<div class="form-group">
				<label name="documento" for="dni">Documento</label>
				<input name="documento" type="number"  class="form-control" required value="{{old('dni')}}" placeholder="DOCUMENTO" title="Introduzca numero de documento">
			</div>
		</div>

		<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
			<div class="form-group">
				<label name="matricula" for="matricula">Matricula</label>
				<input name="matricula" type="number"  class="form-control" required value="{{old('matricula')}}" placeholder="MATRICULA" title="Introduzca numero de matricula">
			</div>
		</div>


		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label>Consultorio</label>
				<select name="consultorio" id="consultorio" class="consultorio form-control" >
					@foreach($consultorios as $con)
						<option value="{{$con->idconsultorio}}">{{$con->numero}}</option>
					@endforeach
				</select>
			</div>
		</div>

		
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label>Nacimiento</label>
				<input type="date" name="nacimiento" id='nacimiento' min="1970-01-01" max="2017-01-01" title="Se necesita fecha" required value="{{old('nacimiento')}}" class="form-control" placeholder="Nacimiento">
			</div>
		</div>

		
		

		<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
			<label for="fecha">Pais</label>
			<div class="form-group">
				<select name="paisnombre" id="paisnombre" class="paisnombre form-control " data-live-search="true"  >
					@foreach($pais as $pai)
						<option >Seleccione Pais</option>
						<option value="{{$pai->idpais}}">{{$pai->nombre}}</option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
			<div class="form-group">
				<label for="fecha">Provincia</label>
				<select name="provincianombre" id="provincianombre" class="provincianombre form-control" >
					<option required value="0" disabled="true" selected="true">Seleccione Provincia</option>
				</select>
			</div>
		</div>

		<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
			<div class="form-group">
				<label for="fecha">Ciudad</label>
				<select name="ciudadnombre" id="ciudadnombre" class="ciudadnombre form-control"  >
					<option  value="0" disabled="true" selected="true" name="ciudadnombre" >Seleccione</option>
				</select>
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label name="direccion" for="direccion">Direccion</label>
				<input name="direccion" style="text-transform:uppercase;" onkeyup="aMays(event, this)" onblur="aMays(event, this)" id="direccion" type="text"  class="form-control" required value="{{old('direccion')}}" placeholder="Direccion">
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="telefono">Telefono</label>
				<input type="text" name="telefono" id="telefono"  class="form-control" required value="{{old('telefono')}}" placeholder="Telefono" >
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<label>Email</label>
					<div class="input-group">
						<div class="input-group-addon">
                    		<i class="fa fa-envelope-o"></i>
                  		</div>
				<input type='email' class='form-control' name="email" required value="{{old('email')}}" required 
				pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" placeholder="Email">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="observaciones">Observaciones</label>
				<textarea name="observaciones" style="text-transform:uppercase;" onkeyup="aMays(event, this)" onblur="aMays(event, this)" id="observaciones"  class="form-control" required value="{{old('observaciones')}}"placeholder="Observaciones" required> </textarea>
			</div>
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

@push ('scripts')



<script>
		
		$(document).ready(function() {

	    $('.paisnombre').select2({
       		theme: "bootstrap"
    	});
	    $('.ciudadnombre').select2({
       		theme: "bootstrap"
    	});;
	    $('.provincianombre').select2({
       		theme: "bootstrap"
    	});;
	    $('.consultorio').select2({
       		theme: "bootstrap"
    	});;

    	$('.idtipo_documento').select2({
       		theme: "bootstrap"
    	});;

    
	    
	});
	</script>
@endpush

<script type="text/javascript">
    $(document).ready(function(){

        $(document).on('change','.paisnombre',function(){
            //console.log("hmm its change");

            var idpais=$(this).val();
            console.log(idpais);
            
            var div=$(this).parent().parent().parent();

            var op=" ";
            
            $.ajax({
                type:'get',
                url:'{!!URL::to('buscarProvincia')!!}',
                data:{'id':idpais},
                headers:{'X-CSFR-TOKEN':$('meta[name="csrf-token"]').attr('content')},
                success:function(data){
                    console.log('success');

                    console.log(data);
                    
                    console.log(data.length);
                    op+='<option value="0" selected disabled>Seleccione Provincia</option>';
                    
                    for(var i=0;i<data.length;i++){
                        
                        op+='<option value="'+data[i].idprovincia+'">'+data[i].nombre+'</option>';
                   }

                   div.find('.provincianombre').html(" ");
                   div.find('.provincianombre').append(op);
                  
                },
                error:function(){

                }
            });

        });

        $(document).on('change','.provincianombre',function () {
            var idprovincia=$(this).val();
            var div=$(this).parent().parent().parent();

            var op=" ";
            $.ajax({
                type:'get',
                url:'{!!URL::to('buscarCiudad')!!}',
                data:{'id':idprovincia},
                //dataType:'json',//return data will be json
                headers:{'X-CSFR-TOKEN':$('meta[name="csrf-token"]').attr('content')},
                success:function(c){
                    console.log('success');

                    console.log(c);

                    //console.log(data.length);
                    op+='<option value="0" selected disabled>Seleccione Ciudad</option>';
                    for(var i=0;i<c.length;i++){
                        op+='<option value="'+c[i].idciudad+'">'+c[i].nombre+'</option>';
                   }

                   div.find('.ciudadnombre').html(" ");
                   div.find('.ciudadnombre').append(op);

                },
                error:function(){

                }
            });


        });

    });
</script>
@push ('scripts') <!-- Trabajar con el script definido en el layout-->
	<script src="{{asset('js/jQuery-3.1.1.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/jquery-3.2.0.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.mask.min.js')}}"></script>
	

	<script type="text/javascript">
		$(document).ready(function($){
			$('#pplus').mask("#.##0,00", {reverse: true});
		})
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