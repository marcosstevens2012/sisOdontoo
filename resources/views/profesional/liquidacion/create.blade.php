@extends ('layouts.admin')
@section ('contenido')

	<?php
	$idprofesional = $_GET['idprofesional'];
	?>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3 class="box-title">PREPARAR LIQUIDACION</h3>
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
						<th>Profesional</th>
						<th>Paciente</th>
						<th>Tratamientos</th>
						
						
					</thead>
					<!-- bucle -->
					<?php $namecontador = 0; ?>
					<?php $idcontador = 0; ?>
					<?php $idcontadordiente = 1000; ?>
					<?php $classcontador = 0; ?>
					@foreach ($liquidaciones as $liq)
					@if($liq->idprofesional == $idprofesional)

					<tr>
						@if($liq->ultimaliq == 0)
						<td><input type="hidden" name="fecha_hora[]" value="{{$liq->fecha_hora}}">{{$liq->fecha_hora}}</td>
						<td><input type="hidden" name="profesional" value="{{$liq->idprofesional}}">{{$liq->profesionalnombre}}</td>
						<td><input type="hidden" name="paciente[]" value="{{$liq->idpaciente}}">{{$liq->pacientenombre}}</td>
						<td style="display: none"><input  type="" name="prestaciones[]" id="<?php echo $idcontador ++; ?>" class="prestaciones"></td>
						<td style="display: none"><input  type="" name="dientes[]" id="<?php echo $idcontadordiente ++; ?>" class="dientes"></td>
						<td style="display: none"><input  type="" name="CodigoOdontograma[]" id="CodigoOdontograma" value="{{$liq->CodigoOdontograma}}" class=""></td>

						<td><input size="30" readonly class="estados" value="{{$liq->estados}}" ></td>
						@endif

						
					</tr>
					@endif
					@endforeach					
				</table>
				
			</div>
			
			
		</div>
		<div class="col-md-6 col-md-offset-3">
			<div class="col-md-12 col-md-offset-3">
				<button class="btn btn-primary" id='siguiente'  type="submit">Siguiente</button>
			</div>
		</div>

		

	</div>
	{!!Form::close() !!}
	<div class="col-md-6 col-md-offset-3">
			<div class="col-md-12 col-md-offset-3">
				<a href="/liquidacion/liquidacion"><button class="btn btn-danger" id="siguiente" type="reset">Volver a Liquidaciones</button></a>
			</div>
		</div>
	<script type="text/javascript">
    $(document).ready(function(){

    		window.onload=function() {
            var contador = 0; 
            var contadordiente = 1000;

            //var ultimaliq = $('#ultimaliq').val();
            //console.log(ultimaliq);
            var arr = $.map(<?php echo json_encode($liquidaciones); ?>, function(el) { return el });
            var tags = [];
            var tagsdiente = [];
            var estadoss = document.getElementById("estados");
            console.log(estadoss);
			if (estadoss == null){

				document.getElementById("siguiente").disabled = true;
				swal({
                  type: 'warning',
                  title:'NADA PARA LIQUIDAR',
                  text: 'Selecciones Ver Liquidaciones para continuar',//carga el titulo con lo q hay en el input notice
                  showConfirmButton:true,
                  confirmButtonText:"Aceptar",
                  width:"70%",
                  padding: '10em',
                  showLoaderOnConfirm: true,
                });
            };	



            
         	$('.estados').each(function(){
         		tags = []
         		tagsdiente = []

         		var estados = ($(this).val());
         		var datosPrestacion= (estados).split("_");
         		//if (ultimaliq == datosPrestacion.length){
            	//
            	
            	
            	//}
         		console.log(datosPrestacion);
         		//for(var i = 0;/*=ultimaliq;*/ i<datosPrestacion.length; i++)
					//{	

						//var partesEstado=datosPrestacion[i].split("_");
						var tratamiento=datosPrestacion[2].split("-");
						//console.log(tratamiento);
						var diente=datosPrestacion[0];
						var idtratamiento=tratamiento[0];
						
						tags.push(idtratamiento); 
						tagsdiente.push(diente);
				//}		
				console.log(tagsdiente);
				console.log(tags);
				setValuetratamientos(contador, tags);
				setValuedientes(contadordiente, tagsdiente);
				
				function setValuetratamientos(id,newvalue) {
  				var s= document.getElementById(id);
  				s.value = newvalue;
				}

				function setValuedientes(id,newvalue) {
  				var x= document.getElementById(id);
  				x.value = newvalue;
				}

				//var x= document.getElementById('ultimaliq');
  				//x.value = i;


				contador++;
				contadordiente++;  

				
         	});
        };
      
  		
		

    });
</script>

@endsection