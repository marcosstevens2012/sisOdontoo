@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de pacientes <a href="paciente/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('paciente.paciente.search')
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
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table id="example1" class="table table-striped table-bordered table-condensed table-hover">
					<thead style="background: #9BE2F3;">
						<th>Nombre</th>
						<th>Apellido</th>
						<th>DNI</th>
						<th>Obra Social</th>
						
						<th>Telefono</th>
						<th>Email</th>
						<th>Condicion</th>
						<th>Opciones</th>
					</thead>
					<!-- bucle -->
					@foreach ($pacientes as $pac)
					<tr>
						<td>{{$pac->nombre}}</td>
						<td>{{$pac->apellido}}</td>
						<td>{{$pac->documento}}</td>
						<td>{{$pac->obrasocial}}</td>
						
						<td>{{$pac->telefono}}</td>
						<td>{{$pac->email}}</td>
						<td>{{$pac->condicion}}</td>
						<td>
							
							<a href="{{URL::action('PacienteController@edit', $pac->idpaciente)}}"><button class="fa fa-pencil-square-o btn btn-info"></button></a>
							<a href="{{URL::action('PacienteController@show', $pac->idpaciente)}}?profesional={{$pac->idpaciente}}"><button class="btn btn-info">Historial/Detalles</button></a>
							<a href="" data-target="#modal-delete-{{$pac->idpaciente}}" data-toggle="modal"><button class="btn btn-danger"> Eliminar</button></a>
						</td>
					</tr>
					@include('paciente.paciente.modal')
					@endforeach
					
				</table>
				
			</div>
			
		</div>

	</div>
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