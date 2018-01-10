@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva Obra Social</h3>
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
	{!! Form::open(array('url'=>'paciente/obrasocial', 'method'=>'POST', 'autocomplete'=>'off', 'files'=>'true'))!!}
	{{Form::token()}}
	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" style="text-transform:uppercase;" onkeyup="aMays(event, this)" onblur="aMays(event, this)" required value="{{old('nombre')}}" class="form-control" placeholder="Nombre">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="codigo">Numero</label>
				<input type="number" name="numero" required value="{{old('numero')}}" class="form-control" placeholder="Numero">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="stock">Telefono</label>
				<input type="tel" name="telefono" required value="{{old('telefono')}}" class="form-control" placeholder="Telefono">
			</div>
			
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="stock_min">Email</label>
				<input type="mail" name="email" required value="{{old('email')}}" class="form-control" placeholder="Email">
			</div>
		</div>

		<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
			<div class="form-group">
				<label>Prestacion</label>
				<select name="pidinsumo" id="pidinsumo" class="form-control selectpicker" data-live-search="true">
				</select>
			</div>
		</div>

		<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
			<div class="form-group">
				<label name="cantidad" for="cantidad">Conseguro</label>
				<input type="number" class="form-control" name="pcantidad" id="pcantidad" placeholder="Conseguro"  value="{{old('conseguro')}}"/>
			</div>
		</div>

		<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
			<div class="form-group">
				<label name="codigo" for="cantidad">Codigo</label>
				<input type="number" class="form-control" name="pcantidad" id="pcantidad" placeholder="Conseguro"  value="{{old('codigo')}}"/>
			</div>
		</div>

		<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
					<div class="form-group">
						<button type="button" id="bt_add" style="margin-top: 25px " class="btn btn-primary btn-lg btn-block">Agregar</button>
					</div>
				</div>

			<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
					<table id="detalles" class="table table-striped table-bordered table-condensed">
						<thead style="background-color: #ccc">
							<th>Opciones</th>
							<th>Prestacion</th>
							<th>Codigo</th>
							<th>Coseguro</th>
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

		<div class="col-md-6 col-md-offset-3">
			<div class="col-md-6 col-md-offset-3">
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
		</div>
		</div>


	</div>
	{!!Form::close() !!}


<script type="text/javascript">




function aMays(e, elemento) {
tecla=(document.all) ? e.keyCode : e.which; 
 elemento.value = elemento.value.toUpperCase();
}

</script>
@endsection