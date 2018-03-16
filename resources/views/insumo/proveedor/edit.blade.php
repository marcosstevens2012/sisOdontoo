@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
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
	{!!Form::model($proveedor, ['method'=>'PATCH', 'route'=>['insumo.proveedor.update', $proveedor->idpersona, $proveedor->idproveedor]])!!}
	{{Form::token()}}
	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group ">
				<label>Nombre</label>
				<input class='form-control' title="Se necesita un nombre" required value="{{$persona->nombre}}" type="text" name="nombre" required>

			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group ">
				<label>Apellido</label>
				<input class='form-control' title="Se necesita un nombre" required value="{{$persona->apellido}}" type="text" name="apellido" required/>

			</div>
		</div>


		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label>Nacimiento</label>
				<input type="date" name="nacimiento" id='nacimiento' title="Se necesita fecha" required value="{{$persona->nacimiento}}" class="form-control" placeholder="Nacimiento">
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label>Tipo Documento</label>
				<select name="idtipo_documento" id="idtipo_documento" class="form-control selectpicker" data-live-search="true">
					@foreach($tipodocumentos as $doc)
						<option value="{{$doc->idtipo_documento}}">{{$doc->nombre}}</option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label name="dni" for="dni">Documento</label>
				<input name="documento" type="number"  class="form-control" required value="{{$persona->documento}}" placeholder="Documento">
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<label for="fecha">Pais</label>
			<div class="form-group">
				<select name="paisnombre" id="paisnombre" class="paisnombre form-control " data-live-search="true"  >
					@foreach($pais as $pai)
						<option ></option>
						<option value="{{$pai->idpais}}">{{$pai->nombre}}</option>
					@endforeach
				</select>
			</div>
		</div>
	
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="fecha">Provincia</label>
				<select name="provincianombre" id="provincianombre"  class="provincianombre form-control" >
					<option required value="" disabled="true" selected="true"></option>
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
				<label name="direccion" for="direccion">Direccion</label>
				<input name="direccion" id="direccion" type="text"  class="form-control" required value="{{$persona->direccion}}" placeholder="Direccion">
			</div>
		</div>


		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="telefono">Telefono</label>
				<input type="tel" name="telefono"  class="form-control" required value="{{$persona->telefono}}" placeholder="Telefono">
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="fecha">Email</label>
				<input type='email' class='form-control' name="email" required value="{{$persona->email}}" required placeholder="email">
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="observaciones">Alertas Medicas</label>
				<textarea name="contradicciones" id="contradicciones"  class="form-control" rows="5" cols="10" value="{{$persona->contradicciones}}" placeholder="contradicciones" required> {{$persona->contradicciones}} </textarea>
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
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

    
	    
	});
	</script>
@endpush

@endsection
