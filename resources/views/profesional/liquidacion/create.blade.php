@extends ('layouts.admin')
@section ('contenido')

	<?php
	$recibir = $_GET['idprofesional'];
	?>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3 class="box-title">NUEVA LIQUIDACION</h3>
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
	{!! Form::open(array('url'=>'profesional/liquidacion', 'method'=>'POST', 'autocomplete'=>'off', 'files'=>'true'))!!}
	{{Form::token()}}
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striliq table-bordered table-condensed table-hover">
					<thead>
						
						<th>Fecha</th>
						<th>Paciente</th>
						<th>Tratamiento</th>
						<th>Opciones</th>
					</thead>
					<!-- bucle -->
					<?php $namecontador = 0; ?>
					<?php $idcontador = 0; ?>
					<?php $classcontador = 0; ?>
					@foreach ($liquidaciones as $liq)
					@if($liq->codigoProfesional == $recibir)
					
					<tr>
						<td>{{$liq->fechaRegistro}}</td>
						<td>{{$liq->codigoPaciente}}</td>
						<td><input name="prestaciones[]" id="<?php echo $idcontador ++; ?>" class="prestaciones"></td>
						<td><input  class="estados" value="{{$liq->estados}}" ></td>
						<td>
							<a href="{{URL::action('LiquidacionController@show', $liq->codigoProfesional)}}"><button class="btn btn-info">Detalles</button></a>
						</td>
					</tr>


					@endif
					@endforeach					
				</table>
				
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

	<script type="text/javascript">
    $(document).ready(function(){

    		window.onload=function() {
            console.log("hmm its change");
            var contador = 0; 

            var arr = $.map(<?php echo json_encode($liquidaciones); ?>, function(el) { return el });
            var contador;
            var tags = [];
         	$('.estados').each(function(){
         		tags = []
         		var estados = ($(this).val());
         		var datosPrestacion= (estados).split("__");
         		//console.log(datosPrestacion);
         		for(var i=0; i<datosPrestacion.length; i++)
				{
				var partesEstado=datosPrestacion[i].split("_");
				var tratamiento=partesEstado[2].split("-");
				var idtratamiento=tratamiento[0];
				
				tags.push(idtratamiento); 

				//console.log(tags);
				}		

				console.log(contador);

        		setValue(contador, tags);
				console.log(tags);
				
				function setValue(id,newvalue) {
  				var s= document.getElementById(id);
  				s.value = newvalue;

				}  
				contador++;  

				
         	});
        };
      
  		
		

    });
</script>

@endsection