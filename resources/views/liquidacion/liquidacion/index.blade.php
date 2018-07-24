@extends ('layouts.admin')
@section ('contenido')

	<div class="row">
		<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
			<h3>Listado de Prestaciones y Tratamientos</h3>
			<a href="/profesional/profesional"><button class="btn btn-success">Liquidar Mes</button></a>
			<br><br>
			
			@include('profesional.liquidacion.search')
			
		</div>
	</div>
	
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table name="example1" id="example1" class="example1 table table-striliq table-bordered table-condensed table-hover">
					<thead style="background: #9BE2F3;">
						<th>Fecha</th>
						<th>Obra Social</th>
						<th>Profesional</th>
						<th>Paciente</th>
						<th>Arcancel</th>
						<th>Pieza Dentaria</th>
						<th>Tratamiento</th>
						<th>Codigo</th>
						<th>Estado</th>
						<th>Liquidar</TH>
					</thead>
					<?php  $sum = 0; $suml =0; ?>
					@foreach ($liquidaciones as $liq)
					<?php $sum= $sum + $liq->coseguro ?>
					<tr>
						<td>{{$liq->fecha}}</td>
						<td>{{$liq->obrasocial}}</td>
						<td>{{$liq->profesionalnombre}}</td>
						<td>{{$liq->pacientenombre}}</td>
						<td>${{$liq->coseguro}}</td>
						<td>{{$liq->diente}}</td>
						<td>{{$liq->prestacion}}</td>
						<td>{{$liq->codigo}}</td>
						@if ($liq->liquidado=='1')
						<?php $suml= $suml + $liq->coseguro ?>
						<td align="center"><small class="label pull-right bg-green">Liquidado</small></td>
						@else
						<td align="center"><small class="label pull-right bg-red">No Liquidado</small></td>
						@endif
						<td>@if($liq->liquidado=='0')<a href="" data-target="#modal-liquidar-{{$liq->id}}" data-toggle="modal"><button class="btn-xs btn-primary">Liquidar</button></a>@endif</td>
					</tr>
					@include('liquidacion.liquidacion.liquidar')
					@endforeach
					<?php $contador = 0; ?>

				</table>

			</div>
		</div>
		
		
			
		
	</div>

	
	<div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Para los datos en tabla</h3>                
                </div>
                      
               	<div class="panel-body">
				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
					<table id="detalles" class="table table-striped table-bordered table-condensed">
						<thead style="background-color: #ccc">
							<th>Total</th>
							<th>Total Liquidado</th>
						</thead>
						<tfoot>
							<th></th>
							<th></th>
						</tfoot>
						<tbody>
							
							<tr>
								<td>$ {{$sum}}</td>
								<td>$ {{$suml}}</td>
							</tr>
							
						</tbody>
					</table>
				</div>
			</div>
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
<script type="text/javascript">
$(document).ready(function(){
    $('#example1').DataTable({
    	"language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            
     }
    } );
} 
);
</script>

@endsection
