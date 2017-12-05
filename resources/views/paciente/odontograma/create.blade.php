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
		<div class="col-md-6 col-md-offset-3">
			<div class="form-group ">
				<label> Nombre</label>
				<input class='form-control' title="Se necesita un nombre" required value="{{old('nombre')}}"type="text" name="nombre" required/>

			</div>
		</div>
		<div class="col-md-6 col-md-offset-3">
			<div class="form-group">
				<label>Obra Social</label>
				<select name="idobra_social" id="idobra_social" class="form-control selectpicker" data-live-search="true">
					@foreach($obrasociales as $obr)
						<option value="{{$obr->idobrasocial}}">{{$obr->nombre}}</option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="col-md-6 col-md-offset-3">
			<div class="form-group">
				<label>Nacimiento</label>
				<input type="date" name="nacimiento" id='nacimiento' title="Se necesita fecha" required value="{{old('nacimiento')}}" class="form-control" placeholder="Nacimiento">
			</div>
		</div>

		<div class="col-md-6 col-md-offset-3">
			<div class="form-group">
				<label>Tipo Sangre</label>
				<select name="tipo_sangre" id="tipo_sangre" required class="form-control selectpicker">
					<option>positivo</option>
					<option>negativo</option>
				</select>
			</div>
		</div>
		<div class="col-md-6 col-md-offset-3">
			<div class="form-group">
				<label name="dni" for="dni">DNI</label>
				<input name="dni" type="number"  class="form-control" required value="{{old('dni')}}" placeholder="DNI">
			</div>
		</div>
		<div class="col-md-6 col-md-offset-3">
			<div class="form-group">
				<label name="direccion" for="direccion">Direccion</label>
				<input name="direccion" id="direccion" type="text"  class="form-control" required value="{{old('direccion')}}" placeholder="Direccion">
			</div>
		</div>

		<div class="col-md-6 col-md-offset-3">
			<label for="fecha">Pais</label>
			<div class="form-group">
				<select name="paisnombre" id="paisnombre" class="paisnombre form-control " data-live-search="true"  >
					@foreach($pais as $pai)
						<option value="{{$pai->idpais}}">{{$pai->nombre}}</option>
						<option >nombre</option>
					@endforeach
				</select>
			</div>
		</div>




		<div class="col-md-6 col-md-offset-3">
			<div class="form-group">
				<label for="fecha">Provincia</label>
				<select name="provincianombre" id="provincianombre" class="provincianombre form-control" >
					<option required value="0" disabled="true" selected="true">Seleccione Provincia</option>
				</select>
			</div>
		</div>

		<div class="col-md-6 col-md-offset-3">
			<div class="form-group">
				<label for="fecha">Ciudad</label>
				<select name="ciudadnombre" id="ciudadnombre" class="ciudadnombre form-control"  >
					<option  value="0" disabled="true" selected="true" name="ciudadnombre" >Seleccione</option>
				</select>
			</div>
		</div>

		<div class="col-md-6 col-md-offset-3">
			<div class="form-group">
				<label for="telefono">Telefono</label>
				<input type="tel" name="telefono"  class="form-control" required value="{{old('telefono')}}" placeholder="Telefono">
			</div>
		</div>
		<div class="col-md-6 col-md-offset-3">
			<div class="form-group">
				<label for="fecha">Email</label>
				<input type='email' class='form-control' name="email" required value="{{old('email')}}"required placeholder="Email">
			</div>
		</div>
		<div class="col-md-6 col-md-offset-3">
			<div class="form-group">
				<label for="observaciones">Observaciones</label>
				<textarea name="observaciones" id="observaciones"  class="form-control" rows="5" cols="10" required value="{{old('observaciones')}}"placeholder="Observaciones" required> </textarea>
			</div>
		</div>
		<div class="col-md-6 col-md-offset-3">
			<div class="form-group">
				<label for="observaciones">Contradicciones</label>
				<textarea name="contradicciones" id="Contradicciones"  class="form-control" rows="5" cols="10" required value="{{old('Contradicciones')}}"placeholder="Observaciones" required> </textarea>
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

@endsection