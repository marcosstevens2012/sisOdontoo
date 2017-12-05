@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar proveedor </h3>
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
	{!!Form::model($proveedor, ['method'=>'PATCH', 'route'=>['insumo.proveedor.update', $proveedor->idpersona]])!!}
	{{Form::token()}}
	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" required value="{{$persona->nombre}}" class="form-control" placeholder="Nombre">
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="direccion">Direccion</label>
				<input type="text" name="direccion" value="{{$persona->direccion}}" class="form-control" placeholder="Direccion">
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label>Documento</label>
				<select name="tipo_documento" class="form-control">
				@if ($persona->tipo_documento=='DNI')
					<option value="DNI" selected>DNI</option>
					<option value="RUC">RUC</option>
					<option value="PASAPORTE">PASAPORTE</option>
				@elseif ($persona->tipo_documento=='RUC')
					<option value="DNI">DNI</option>
					<option value="RUC" selected>RUC</option>
					<option value="PASAPORTE">PASAPORTE</option>
				@else
					<option value="DNI">DNI</option>
					<option value="RUC">RUC</option>
					<option value="PASAPORTE" selected>PASAPORTE</option>
				@endif
				</select>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="dni">NUM. DOCUMENTO</label>
				<input type="text" name="dni"  value="{{$persona->dni}}" class="form-control" placeholder="Num. documento">
			</div>
		</div>

		<div class="col-md-6 col-md-offset-3">
			<div class="form-group">
				<label>Nacimiento</label>
				<input type="date" name="nacimiento" id='nacimiento' title="Se necesita fecha" required value="{{old('nacimiento')}}" class="form-control" placeholder="Nacimiento">
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="telefono">Teléfono</label>
				<input type="text" name="telefono"  value="{{$persona->telefono}}" class="form-control" placeholder="Telefono">
			</div>
			
		</div>
		

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
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

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="fecha">Provincia</label>
				<select name="provincianombre" id="provincianombre"  class="provincianombre form-control" >
					<option required value="{{$persona->provincianombre}}" disabled="true" selected="true"></option>
				</select>
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="fecha">Ciudad</label>
				<select name="ciudadnombre" id="ciudadnombre" class="ciudadnombre form-control"  >
					<option  value="0" disabled="true" selected="true" name="ciudadnombre" >Seleccione</option>
				</select>
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="fecha">Email</label>
				<input type='email' class='form-control' name="email" required value="{{old('email')}}"required placeholder="Email">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="observaciones">Observaciones</label>
				<textarea name="observaciones" id="observaciones"  class="form-control" rows="5" cols="10" required value="{{old('observaciones')}}"placeholder="Observaciones" required> </textarea>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="observaciones">Contradicciones</label>
				<textarea name="contradicciones" id="Contradicciones"  class="form-control" rows="5" cols="10" required value="{{old('Contradicciones')}}"placeholder="Observaciones" required> </textarea>
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
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