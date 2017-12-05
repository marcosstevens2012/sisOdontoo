@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="col-md-6 col-md-offset-3">
				<h3>Nuevo Consultorio</h3>
			</div>
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
	{!! Form::open(array('url'=>'profesional/consultorio', 'method'=>'POST', 'autocomplete'=>'off', 'files'=>'true'))!!}
	{{Form::token()}}
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="form-group">
				<label for="numero">Numero</label>
				<input type="number" name="numero" required value="{{old('numero')}}" class="form-control" placeholder="Numero">
			</div>
		</div>
		<div class="col-md-6 col-md-offset-3">
			<div class="form-group">
				<label for="piso">Piso</label>
				<input type="number" name="piso" required value="{{old('piso')}}" class="form-control" placeholder="Piso">
			</div>
		</div>
		<div class="col-md-6 col-md-offset-3">
			<div class="form-group">
				<label for="sillas">Sillas</label>
				<input type="number" name="sillas" required value="{{old('sillas')}}" class="form-control" placeholder="Sillas">
			</div>
		</div>

		<div class="col-md-6 col-md-offset-3">
			<div class="form-group">
				<label for="sillas">Direccion</label>
				<input type="direccion" style="text-transform:uppercase;" onkeyup="aMays(event, this)" onblur="aMays(event, this)" name="direccion" required value="{{old('direccion')}}" class="form-control" placeholder="Direccion">
			</div>
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