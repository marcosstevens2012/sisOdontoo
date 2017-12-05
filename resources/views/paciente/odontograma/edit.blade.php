@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<h3>Editar Paciente </h3>
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
	{!!Form::model($paciente, ['method'=>'PATCH', 'route'=>['paciente.paciente.update', $paciente->idpersona],'files'=>'true'])!!}
	{{Form::token()}}
	<div class="row">
		<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="form-group ">
				<label> Nombre</label>
				<input class='form-control' title="Se necesita un nombre" required value="{{$persona->nombre}}" type="text" name="nombre" required/>
			</div>
		</div>
		
		
	</div>

	{!!Form::close() !!}
@endsection