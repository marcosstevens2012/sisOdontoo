@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Consultorio {{$consultorio->numero}}</h3>
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
	{!!Form::model($consultorio, ['method'=>'PATCH', 'route'=>['profesional.consultorio.update', $consultorio->idconsultorio],'files'=>'true'])!!}
	{{Form::token()}}
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="form-group">
				<label for="numero">Numero</label>
				<input type="text" name="numero" required value="{{$consultorio->numero}}" class="form-control" placeholder="Numero">
			</div>
		</div>

		<div class="col-md-6 col-md-offset-3">
			<div class="form-group">
				<label for="piso">Piso</label>
				<input type="text" name="piso" required value="{{$consultorio->piso}}" class="form-control" placeholder="piso">
			</div>
			
		</div>

		<div class="col-md-6 col-md-offset-3">
			<div class="form-group">
				<label for="sillas">Sillas</label>
				<input type="number" name="sillas" required value="{{$consultorio->sillas}}" class="form-control" placeholder="Sillas">
			</div>
		</div>


		<div class="col-md-6 col-md-offset-3">
			<div class="form-group">
				<label>Estado</label>
				<select name="estado" id="estado" required class="form-control selectpicker">
					<option>Activo</option>
					<option>Inactivo</option>
				</select>
			</div>
		</div>

		<div class="col-md-6 col-md-offset-3">
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
		</div>
	</div>
	{!!Form::close() !!}
@endsection