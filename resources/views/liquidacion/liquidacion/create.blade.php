@extends ('layouts.admin')
@section ('contenido')

	<?php
	$idprofesional = $_GET['idprofesional'];
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
						<td><input type="hidden" name="fecha_hora[]" value="{{$liq->fecha_hora}}">{{$liq->fecha_hora}}</td>
						<td><input type="hidden" name="profesional" value="{{$liq->idprofesional}}">{{$liq->profesionalnombre}}</td>
						<td><input type="hidden" name="paciente[]" value="{{$liq->idpaciente}}">{{$liq->pacientenombre}}</td>
						<td style="display: none"><input  type="hidden" name="prestaciones[]" id="<?php echo $idcontador ++; ?>" class="prestaciones"></td>
						<td style="display: none"><input  type="hidden" name="dientes[]" id="<?php echo $idcontadordiente ++; ?>" class="dientes"></td>
						<td><input size="30" readonly class="estados" value="{{$liq->estados}}" ></td>
						<td><input type="hidden" class="ultimaliq" id="ultimaliq" name="ultimaliq" value="" ></td>
						<td><input type="hidden" class="idodontograma" id="idodontograma" name="idodontograma" value="{{$liq->codigoOdontograma}}" ></td>
						
					</tr>
					@endif
					@endforeach					
				</table>
				
			</div>
			
			
		</div>
		<div class="col-md-6 col-md-offset-3">
			<div class="col-md-6 col-md-offset-3">
				<button class="btn btn-primary"  type="submit">Siguiente</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
		</div>

		

	</div>
	{!!Form::close() !!}

	<script type="text/javascript">
    $(document).ready(function(){

    		window.onload=function() {
            var contador = 0; 
            var contadordiente = 1000; 
            var ultimaliq = {{$liq->ultimaliq}};

            var arr = $.map(<?php echo json_encode($liquidaciones); ?>, function(el) { return el });
            var tags = [];
            var tagsdiente = [];
         	$('.estados').each(function(){
         		tags = []
         		tagsdiente = []

         		var estados = ($(this).val());
         		var datosPrestacion= (estados).split("__");
         		//console.log(datosPrestacion);
         		for(var i=ultimaliq; i<datosPrestacion.length; i++)
					{
						var partesEstado=datosPrestacion[i].split("_");
						var tratamiento=partesEstado[2].split("-");
						var diente=partesEstado[0];
						var idtratamiento=tratamiento[0];
						
						tags.push(idtratamiento); 
						tagsdiente.push(diente);
				}		

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

				var x= document.getElementById('ultimaliq');
  				x.value = i;


				contador++;
				contadordiente++;  

				
         	});
        };
      
  		
		

    });
</script>

@endsection