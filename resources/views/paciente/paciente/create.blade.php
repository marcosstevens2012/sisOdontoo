@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Paciente</h3>
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
	{!! Form::open(array('url'=>'paciente/paciente', 'method'=>'POST', 'autocomplete'=>'off', 'files'=>'true'))!!}
	{{Form::token()}}
	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group ">
				<label>Nombre*</label>
				<input class='form-control'  style="text-transform:uppercase;" onkeyup="aMays(event, this); this.value=this.value.replace(/[^a-zA-Z]/g,'');"
				onblur="aMays(event, this)" required value="{{old('nombre')}}" type="text" name="nombre" required="required" 
         		title="Solo letras, maximo 30 minimo 5" min="5" maxlength="30" />
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group ">
				<label>Apellido*</label>
				<input class='form-control'  style="text-transform:uppercase;" onkeyup="aMays(event, this); this.value=this.value.replace(/[^a-zA-Z]/g,'');" onblur="aMays(event, this)" title="Se necesita un apellido" required value="{{old('apellido')}}" required="required" type="text" id="apellido" name="apellido" min="5" maxlength="30" />
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label>Obra Social*</label>
				<select name="obrasocial" id="obrasocial" class="form-control selectpicker" data-live-search="true">
						<option>Seleccione Obra Social</option>
					@foreach($obrasociales as $obr)
						<option value="{{$obr->idobrasocial}}">{{$obr->nombre}}</option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label>Numero de Carnet</label>
				<input type="text" name="carnet" id='carnet' title="Se necesita numero de carnet de la obra social" required value="{{old('carnet')}}" class="form-control" placeholder="Numero de Carnet" required pattern="[0-9]{5,40}" required="required">
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label>Fecha de Nacimiento*</label>
				<input type="date" name="nacimiento" id='nacimiento' title="Se necesita fecha" required value="{{old('nacimiento')}}" class="form-control" placeholder="Nacimiento" value="<?php echo date("Y-m-d");?>" data-date-format="mm/dd/yyyy" max="<?php echo date("Y-m-d");?>" data-date-format="mm/dd/yyyy" required="required">
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label>Tipo Sangre*</label>
				<select name="tipo_sangre" id="tipo_sangre" required="required" class="form-control selectpicker">
					<option>O-</option>
					<option>O+</option>
					<option>A−</option>
					<option>A+</option>
					<option>B−</option>
					<option>B+</option>
					<option>AB-</option>
					<option>AB+</option>
				</select>
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label>Tipo Documento*</label>
				<select name="idtipo_documento" id="idtipo_documento" class="form-control selectpicker" data-live-search="true">
					@foreach($tipodocumentos as $doc)
						<option value="{{$doc->idtipo_documento}}">{{$doc->nombre}}</option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label name="documento" for="dni">Documento*</label>
				<input name="documento" id="documento" type="text"  class="form-control" required value="{{old('documento')}}" required pattern="[0-9]{5,20}" placeholder="DNI" required="required">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label name="direccion"  for="direccion">Direccion*</label>
				<input name="direccion" style="text-transform:uppercase;" onkeyup="aMays(event, this)" onblur="aMays(event, this)" id="direccion" type="text"  class="form-control" required value="{{old('direccion')}}" placeholder="Direccion" max="50" required="required">
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label name="telefono" for="direccion">Telefono*</label>
				<input name="telefono" id="telefono" type="tel"  class="form-control" required value="{{old('telefono')}}" placeholder="Telefono" title="Ingrese un numero de telefono valido" required="required">
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label name="email" for="email">Email*</label>
				<input name="email" id="email" type="text"  class="form-control" required value="{{old('email')}}" placeholder="Direccion de email" required="required">
			</div>
		</div>


		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<label for="fecha">Pais*</label>
			<div class="form-group">
				<select name="paisnombre" id="paisnombre" class="paisnombre form-control " data-live-search="true" required="required"  >
					@foreach($pais as $pai)
						<option >Seleccione Pais</option>
						<option value="{{$pai->idpais}}">{{$pai->nombre}}</option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="fecha">Provincia*</label>
				<select name="provincianombre" id="provincianombre" class="provincianombre form-control" >
					<option required='required' value="0" disabled="true" selected="true">Seleccione Provincia</option>
				</select>
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="fecha">Ciudad*</label>
				<select name="ciudadnombre" id="ciudadnombre" class="ciudadnombre form-control"  >
					<option  value="0" disabled="true" selected="true" name="ciudadnombre" >Seleccione Ciudad</option>
				</select>
			</div>
		</div>

		
		<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
			<div class="form-group">
				<label for="observaciones">Alertas Medicas</label>
				<textarea name="contradicciones" id="contradicciones" style="text-transform:uppercase;" onkeyup="aMays(event, this)" onblur="aMays(event, this)" id="Contradicciones"  class="form-control" required value="{{old('contradicciones')}}" placeholder="Ingrese alguna observacion medica a tener en cuenta" required="required"></textarea>
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="imagen">Imagen</label>
				<input type="file" name="imagen" class="form-control" >
			</div>
			
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
<script src="{{asset('js/jQuery-3.1.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery-3.2.0.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.mask.min.js')}}"></script>

<script type="text/javascript">
	//MASCARAS PARA LOS INPUTS
$(document).ready(function($){
		$('#carnet').mask("99999999", {reverse: true});
		$('#documento').mask("99999999", {reverse: true});
		$("#telefono").mask("999 99 99 99");
		
	})
</script>

<script type="text/javascript">
	//SELECTS DINAMICOS DE LOCALIDAD
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

<script type="text/javascript">
	//PONER EN MAYUSCULA LOS INPUTS
function aMays(e, elemento) {
tecla=(document.all) ? e.keyCode : e.which; 
 elemento.value = elemento.value.toUpperCase();
}
$(".nombre").on("input", function(){
  var regexp = /[^a-zA-Z]/g;
  if($(this).val().match(regexp)){
    $(this).val( $(this).val().replace(regexp,'') );
  }
});
</script>


@push ('scripts')

<script>
		//BUSCADOR DE LOS SELECTS 
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
    
	    
	});
	</script>
@endpush

@endsection