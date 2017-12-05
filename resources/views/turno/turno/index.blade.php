@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<h3>Listado de Turnos <a href="turno/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('turno.turno.search')
		</div>
	</div>

	@if(Session::has('notice'))<!-- crea una alerta de q ha sido creado correctamente el usuario-->
                
   					<div class="alert alert-info">{{ Session::get('notice') }}</div>
				
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
						<th>Final</th>
						<th>Fecha</th>
						<th>Opciones</th>
					</thead>
					<!-- bucle -->
					@foreach ($turnos as $tur)
					<tr>
						<td>{{$tur->paciente}}</td>
						<td>{{$tur->prestacion}}</td>
						<td>{{$tur->profesional}}</td>
						@if ($tur->estado=='Activo')
						<td><small class="label pull-right bg-green">{{$tur->estado}}</small></td>
						@elseif ($tur->estado=='Pendiente')
						<td><small class="label pull-right bg-yellow">{{$tur->estado}}</small></td>
						@else
						<td><small class="label pull-right bg-red">{{$tur->estado}}</small></td>
						@endif
						<td>{{$tur->hora_inicio}}</td>
						<td>{{$tur->hora_fin}}</td>
						<td>{{$tur->fecha}}</td>
						<td>
						<a href="{{URL::action('TurnoController@edit', $tur->idturno)}}"><button class="btn btn-info"> Editar</button></a>
              			<a href="{{URL::action('TurnoController@show', $tur->idturno)}}"><button class="btn btn-info"> Seguimiento</button></a>
						<button class="edit-modal btn btn-info" data-id="{{$item->id}}" data-name="{{$item->name}}">
                    <span class="glyphicon glyphicon-edit"></span> Edit
                </button>
					</tr>
					@include('turno.turno.modal')
					@endforeach
					
				</table>
				
			</div>
			{{$turnos->render()}}
			
		</div>

	</div>

	<script>
	$(document).on('click', '.edit-modal', function() {
        $('#footer_action_button').text(" Update");
        $('#footer_action_button').addClass('glyphicon-check');
        $('#footer_action_button').removeClass('glyphicon-trash');
        $('.actionBtn').addClass('btn-success');
        $('.actionBtn').removeClass('btn-danger');
        $('.actionBtn').addClass('edit');
        $('.modal-title').text('Edit');
        $('.deleteContent').hide();
        $('.form-horizontal').show();
        $('#fid').val($(this).data('id'));
        $('#n').val($(this).data('name'));
        $('#myModal').modal('show');
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