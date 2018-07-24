@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>LISTADO DE PEDIDOS<a href="pedido/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('mecanico.pedido.search')
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
						
						<th>Fecha</th>
						<th>Mecanico</th>
						<th>Estado</th>
						<th>Opciones</th>
					</thead>
					<!-- bucle -->
					@foreach ($pedidos as $ped)
					<tr>
						<td align="left"> <?php 
												$originalDate = $ped->fecha_hora;
        										$newDate = date("d-m-Y h:i:s", strtotime($originalDate));

											?>{{$newDate}}</td>
						
						<td>{{$ped->apellido}} {{$ped->nombre}}</td>
						@if ($ped->estado=='Activo')
						<td><small class="label pull-center bg-green">{{$ped->estado}}</small></td>
						@elseif ($ped->estado=='Pendiente')
						<td><small class="label pull-center bg-yellow">{{$ped->estado}}</small></td>
						@else
						<td><small class="label pull-center bg-red">{{$ped->estado}}</small></td>
						@endif
						<td>
							<a href="{{URL::action('PedidoController@show', $ped->idpedido)}}"><button class="btn btn-info">Detalles</button></a>
							<a href="{{URL::action('PedidoController@edit', $ped->idpedido)}}"><button class="btn btn-info">Editar Estado</button></a>
							<a href="" data-target="#modal-delete-{{$ped->idpedido}}" data-toggle="modal"><button class="btn btn-danger">Finalizar</button></a>
						</td>
					</tr>
					@include('mecanico.pedido.modal')
					@endforeach
					
				</table>
				
			</div>
			{{$pedidos->render()}}
			
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