@extends ('layouts.admin')
@section ('contenido')

	<?php
	$recibir = $_GET['idprofesional'];
	?>

	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>LISTADO DE LIQUIDACIONES</h3>
			@include('profesional.liquidacion.search')
		</div>
	</div>
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
						<td><input name="<?php echo $namecontador ++ ?>" id="<?php echo $idcontador ++; ?>" class="<?php echo $classcontador ++;?>"></td>
						<td><input  class="estados" value="{{$liq->estados}}" ></td>
						<td>
							<a href="{{URL::action('LiquidacionController@show', $liq->codigoProfesional)}}"><button class="btn btn-info">Detalles</button></a>
						</td>
					</tr>


					@endif
					@include('profesional.liquidacion.modal')
					@endforeach
					<?php $contador = 0; ?>
					
				</table>
				
			</div>
			
			
		</div>
	</div>


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
         	

            /*var datosPrestacion=$(arr[i]).val().split("__");
            idprestacion = datosPrestacion[0];
            console.log(estados);
			console.log(tratamiento);
			console.log('idtratamiento', idtratamiento);
        
            var div=$(this).parent();

            var op=" ";*/
        };
      
  		
		

    });
</script>

@endsection