@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>NUEVO INSUMO</h3>
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
	{!! Form::open(array('url'=>'insumo/insumo', 'method'=>'POST', 'autocomplete'=>'off', 'files'=>'true'))!!}
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
				<label for="codigo">Código</label>
				<input type="number" name="codigo" required value="{{old('codigo')}}" class="form-control" placeholder="Código">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="stock">Stock</label>
				<input type="number" name="stock" required value="{{old('stock')}}" class="form-control" placeholder="Stock">
			</div>
			
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="stock_min">Stock_minimo</label>
				<input type="number" name="stock_min" required value="{{old('stock_min')}}" class="form-control" placeholder="Stock Minimo">
			</div>
			
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="descripcion">Descripcion</label>
				<input type="text" name="descripcion" style="text-transform:uppercase;" onkeyup="aMays(event, this)" onblur="aMays(event, this)" required value="{{old('descripcion')}}" class="form-control" placeholder="Descripcion">
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