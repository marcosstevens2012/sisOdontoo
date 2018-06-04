@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		
                        
                    
		<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
			<h3>Listado de Turnos</h3>
			<a href="turno/create"><button class="btn btn-success">Nuevo</button></a>
			<br><br>
			
			@include('turno.turno.search')
			
		</div>
	</div>
	 @if (Session::has('notice'))
         <input type="hidden" name="notice" id="notice" value="{{Session::get('notice')}}"> <!--cargo en un input el valor para q sea mas facil acceder a ese valoe desde javascript //es la form q se jajaj -->
           @if (session()->has('popup') && Session::get('popup')=='open') 
           <!--si todo salio bien al guardar entra aca e genera la alerta -->
            <script>  
                 swal({
                  type: 'success',
                  title: $('#notice').val(),//carga el titulo con lo q hay en el input notice
                  showConfirmButton:true,
                  confirmButtonText:"Aceptar",
                  width:"70%",
                  padding: '10em',
                  showLoaderOnConfirm: true,
                });

            </script>
            @endif

            @if (session()->has('popup') && Session::get('popup')!='open') 
        
            <script>
              //si no  se guardo correctaente tira error perro
                 swal({
                  type: 'error',
                  title: $('#notice').val(),
                  showConfirmButton:true,
                  confirmButtonText:"Aceptar",
                  width:"100%",
                  padding: '10em',
                  showLoaderOnConfirm: true,
                });
            </script>
            @endif

        @endif

         @if (Session::get('popup')=='open' && !empty(Session::get('id')))

        <input type="hidden" name="idturno" id="idturno" value="{{Session::get('id')}}">
        <script>

            //si se guardo bien y existe la var id q mando desde el controlador 
            //va a generrar una nueva ventana con el pdf
            id=$('#idturno').val();
            url='/turno/pdf/'+id;
        window.open(url, "Turno", "width=600, height=720, top=0, left=0")
        </script>
        @endif
	<div class="row">

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<th>Paciente</th>
						<th>Prestacion</th>
						<th>Profesional</th>
						<th>Estado</th>
						<th>Inicio</th>
						<th>Fecha</th>
						<th>Opciones</th>
					</thead>
					<!-- bucle -->
					<?php  
        			$user=\Auth::user()->tipoUsuario; 
      				?>
					@foreach ($turnos as $tur)
					<tr>
						<td align="center">{{$tur->paciente}}</td>
						<td align="center" >{{$tur->prestacion}}</td>
						<td align="center">{{$tur->profesional}}</td>
						@if ($tur->estado=='En consultorio')
						<td align="center"><small class="label pull-right bg-green">{{$tur->estado}}</small></td>
						@elseif ($tur->estado=='Pendiente')
						<td align="center"><small class="label pull-right bg-yellow">{{$tur->estado}}</small></td>
						@else
						<td align="center"><small class="label pull-right bg-red">{{$tur->estado}}</small></td>
						@endif
						<td align="right">{{$tur->hora_inicio}}</td>
						<td align="right"> <?php 
												$originalDate = $tur->fecha;
        										$newDate = date("d-m-Y", strtotime($originalDate));

											?>{{$newDate}}</td>
						<td>
						@if ($user==2)
						@if ($tur->estado =='En consultorio')
						<a href="{{URL::action('PacienteController@show' , $tur->idpaciente)}}"><button class="btn-xs btn-primary">Paciente</button></a>
						@endif
						@endif
						@if ($user==1)
						@if ($tur->estado =='En consultorio')
						<a href="{{URL::action('PacienteController@show' , $tur->idpaciente)}}"><button class="btn-xs btn-primary">Paciente</button></a>
						@endif
						@endif
						@if ($tur->estado =='Pendiente')
						<a href="" data-target="#modal-sala-{{$tur->idturno}}" data-toggle="modal"><button class="btn-xs btn-primary">En Sala</button></a>
						@endif
						@if ($tur->estado =='En sala de espera')
						<a href="" data-target="#modal-consultorio-{{$tur->idturno}}" data-toggle="modal"><button class="btn-xs btn-primary">En Consultorio</button></a>
						@endif
						<a href="" data-target="#modal-finalizado-{{$tur->idturno}}" data-toggle="modal"><button class="btn-xs btn-primary">Finalizado</button></a>
						@if ($tur->estado =='Finalizado')
						<a href="{{URL::action('TransaccionController@create', ['idpaciente'=>$tur->idpaciente])}}"><button class="btn .btn.bg-maroon">Cobrar</button></a>
						@endif
              			<a href="{{URL::action('PdfturnoController@show', $tur->idturno)}}"><button class="btn-xs btn-info">Reporte</button></a></td>
					</tr>
					@include('turno.turno.modal')
					@include('turno.turno.modal-consultorio')
					@endforeach
				</table>
				
			</div>
			
			
		</div>

	</div>

<script type="text/javascript">
$(document).ready(function() {
    $('#example1').DataTable( {
        "order": [[ 5, "desc" ]],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            
     }
    });
} );
</script>
@endsection