@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3 class="box-title">NUEVO PROVEEDOR</h3>
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
	{!! Form::open(array('url'=>'insumo/proveedor', 'method'=>'POST', 'autocomplete'=>'off'))!!}
	{{Form::token()}}
<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group ">
				<label>Nombre</label>
				<input class='form-control' style="text-transform:uppercase;" onkeyup="aMays(event, this)" onblur="aMays(event, this)" title="Se necesita un nombre" required value="{{old('nombre')}}"type="text" name="nombre" 
         		title="Letras"/>

			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group ">
				<label> Apellido</label>
				<input class='form-control' style="text-transform:uppercase;" onkeyup="aMays(event, this)" onblur="aMays(event, this)" title="Se necesita un apellido" required value="{{old('apellido')}}"type="text" name="apellido"  />

			</div>
		</div>
		

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label>Nacimiento</label>
				<input type="date" name="nacimiento" id='nacimiento' title="Se necesita fecha" required value="{{old('nacimiento')}}" class="form-control" placeholder="Nacimiento" min="1800-01-01" max="2020-12-31">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label>Tipo Documento</label>
				<select name="tipodocumento" id="tipodocumento" required class="form-control selectpicker">
					<option >Seleccione Documento</option>
					@foreach($documento as $doc)

						<option value="{{$doc->idtipo_documento}}">{{$doc->nombre}}</option>
						
					@endforeach
				</select>
			</div>
		</div>
		
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label name="documento" for="documento">DOCUMENTO</label>
				<input name="documento" type="number"  class="form-control" required value="{{old('documento')}}" placeholder="DOCUMENTO" maxlength="8" >
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label name="email" for="email">EMAIL</label>
				<input name="email" type="mail"  class="form-control" required value="{{old('email')}}" placeholder="EMAIL" >
			</div>
		</div>


		<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
			<label for="fecha">Pais</label>
			<div class="form-group">
				<select class="paisnombre js-states form-control" name="paisnombre"  id="paisnombre" >
					<option >Seleccione Pais</option>
					@foreach($pais as $pai)

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

		<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
					<div class="form-group">
						<label for="telefono">Telefono</label>
						<input type="" name="ptelefono" id="ptelefono"  class="form-control" value="{{old('telefono')}}" placeholder="Telefono">
					</div>
		</div>
		<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
				<div class="form-group">
					<label for="fecha">Direccion</label>
					<input type='text' style="text-transform:uppercase;" onkeyup="aMays(event, this)" onblur="aMays(event, this)" class='form-control' name="pemail" id="pemail" required value="{{old('email')}}" placeholder="Direccion">
					</div>
		</div>

		<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
			<div class="form-group">
				<button type="button" id="bt_add" class="btn btn-primary">Agregar</button>
			</div>
			</div>

				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
					<table id="detalles" class="table table-striped table-bordered table-condensed">
						<thead style="background-color: #ccc">
							<th>Opciones</th>
							<th>Telefono</th>
							<th>Direccion</th>
							
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

		<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
			<div class="form-group">
				<label for="observaciones">Observaciones</label>
				<textarea name="observaciones" style="text-transform:uppercase;" onkeyup="aMays(event, this)" onblur="aMays(event, this)" id="observaciones"  class="form-control" rows="5" cols="10" required value="{{old('observaciones')}}"placeholder="Observaciones" required> </textarea>
			</div>
		</div>
		
	
		<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" id="guardar">
			<div class="form-group">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
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

@push ('scripts') <!-- Trabajar con el script definido en el layout-->
	<script>
		$(document).ready(function(){
			$('#bt_add').click(function(){
				agregar();
			});
		});
		var cont=0;
		subtotal=[];
		

		function agregar(){
			precio_compra = $('#ptelefono').val();
			precio_venta = $('#pemail').val();
			if( precio_compra != "" && precio_venta != ""){
				var fila = '<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+')" >X</button></td><td><input type="text" name="telefono[]" value="'+precio_compra+'"></td><td><input type="text" name="direccion[]" value="'+precio_venta+'"></td></tr>';
				cont++;
				$('#detalles').append(fila);
				limpiar();
				
			}else{
				alert("Error al ingresar el detalle del ingreso, revise los datos del insumo");
			}


		}
		function limpiar(){
			$('#ptelefono').val("");
			$('#pemail').val("");
		}

		function eliminar(index){
			$("#fila" + index).remove();
			evaluar();
		}
	</script>

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

	<script type="text/javascript">

		function aMays(e, elemento) {
		tecla=(document.all) ? e.keyCode : e.which; 
		 elemento.value = elemento.value.toUpperCase();
		}

	</script>
	

@endsection
