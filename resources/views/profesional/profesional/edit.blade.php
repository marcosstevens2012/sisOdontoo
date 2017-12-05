@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<h3>Editar persona </h3>
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
	{!!Form::model($profesional, ['method'=>'PATCH', 'route'=>['profesional.profesional.update', $profesional->idprofesional],'files'=>'true'])!!}
	{{Form::token()}}
	<div class="row">
		
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group ">
				<label> Nombre</label>
				<input class='form-control' title="Se necesita un nombre" value="{{$persona->nombre}}" type="text" name="nombre" required/>
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group ">
				<label>Apellido</label>
				<input class='form-control' style="text-transform:uppercase;" onkeyup="aMays(event, this)" onblur="aMays(event, this)" title="Se necesita un Apellido" required value="{{$persona->apellido}}" type="text" name="apellido" required/>

			</div>
		</div>


		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label>Consultorio</label>
				<select name="pconsultorio" id="pconsultorio" class="form-control selectpicker" data-live-search="true">
					@foreach($consultorios as $con)
						<option value="{{$con->idconsultorio}}">{{$con->numero}}</option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label>Nacimiento</label>
				<input type="date" name="nacimiento" id='nacimiento' title="Se necesita fecha" required value="{{old('nacimiento')}}" class="form-control" placeholder="Nacimiento">
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label>Tipo Documento</label>
				<select name="idtipo_documento" id="idtipo_documento" class="form-control selectpicker" data-live-search="true">
					@foreach($tipodocumentos as $doc)
						<option value="{{$doc->idtipo_documento}}">{{$doc->nombre}}</option>
					@endforeach
				</select>
			</div>
		</div>
		
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label name="documento" for="dni">Documento</label>
				<input name="documento" type="number"  class="form-control" required value="{{old('dni')}}" placeholder="DNI">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label name="direccion" for="direccion">Direccion</label>
				<input name="direccion" style="text-transform:uppercase;" onkeyup="aMays(event, this)" onblur="aMays(event, this)" id="direccion" type="text"  class="form-control" required value="{{old('direccion')}}" placeholder="Direccion">
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<label for="fecha">Pais</label>
			<div class="form-group">
				<select name="paisnombre" id="paisnombre" class="paisnombre form-control " data-live-search="true"  >
					@foreach($pais as $pai)
						<option >Seleccione Pais</option>
						<option value="{{$pai->idpais}}">{{$pai->nombre}}</option>
						
					@endforeach
				</select>
			</div>
		</div>




		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="fecha">Provincia</label>
				<select name="provincianombre" id="provincianombre" class="provincianombre form-control" >
					<option required value="0" disabled="true" selected="true">Seleccione Provincia</option>
				</select>
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="fecha">Ciudad</label>
				<select name="ciudadnombre" id="ciudadnombre" class="ciudadnombre form-control"  >
					<option  value="0" disabled="true" selected="true" name="ciudadnombre" >Seleccione</option>
				</select>
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="telefono">Telefono</label>
				<input type="tel" name="telefono"  class="form-control" required value="{{old('telefono')}}" placeholder="Telefono">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="fecha">Email</label>
				<input type='email' class='form-control' name="email" required value="{{old('email')}}" required 
				pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" placeholder="Email">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="observaciones">Observaciones</label>
				<textarea name="observaciones" style="text-transform:uppercase;" onkeyup="aMays(event, this)" onblur="aMays(event, this)" id="observaciones"  class="form-control" rows="5" cols="10" required value="{{old('observaciones')}}"placeholder="Observaciones" required> </textarea>
			</div>
		</div>
		
		
		<div class="col-md-6 col-md-offset-3">
			<div class="col-md-6 col-md-offset-3">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
		</div>

	</div>

	{!!Form::close() !!}
@endsection