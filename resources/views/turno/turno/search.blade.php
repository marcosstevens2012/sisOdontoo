{!! Form::open(array('url'=>'turno/turno', 'method'=>'GET', 'autcomplete'=>'off', 'role'=>'search'))!!}
                    <div class="box box-success">
			            <div class="box-header with-border">
			              <h3 class="box-title">Busqueda</h3>
			            </div>
      					<div class="panel-body">
                                    <div class="form-group col-lg-2 col-sm-2 col-md-8 col-xs-12">
                                                <h4>Fecha Desde:</h4>
                                                <div >
                                                    <input type="date" class="form-control " name="fecha_inicio" id="fecha_inicio" value="{{$fecha_inicio}}">
                                                </div>
                                    </div>
                                    <div class="form-group col-lg-2 col-sm-2 col-md-8 col-xs-12">
                                                <h4>Fecha Hasta:</h4>
                                                <div >
                                                    <input type="date" class="form-control " name="fecha_fin" id="fecha_fin" value="{{$fecha_fin}}">
                                                </div>
                                            </div>
                                    <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                                                <div class="form-group">
                                                    <h4>Estado</h4>
                                                    <select name="estado_t" id="estado_t" class="estado_t form-control selectpicker" data-live-search="true">
                                                    <option value="" disabled="true" selected="true">Seleccione</option>
                                                              
                                                    <option value="1">Pendiente</option>

                                                    <option value="2">Finalizado</option>  
                                                     
                                                    <option value="4">En sala de espera</option> 

                                                    <option value="3">En consultorio</option>

                                              
                                                    </select>    
                                              </div>
                                    </div>
                                    <div class="form-group col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    	<h4>Buscar </h4>
                                    	<input type="text" class="form-control" id="searchText" name="searchText" value="{{$searchText}}" placeholder="Paciente, Profesional, fecha..." >
										
									</div>
									<div class="form-group col-lg-4 col-sm-4 col-md-4 col-xs-12">
										<span class="input-group-btn"><button type="submit" class="btn btn-primary">Buscar</button></span>

									</div>
                         </div>  
					</div>
	

{{Form::close()}}


{!! Form::open(['route' => ['turno.pdfgeneral.store', 'searchText' =>$searchText,'fecha_inicio'=>$fecha_inicio,'fecha_fin'=>$fecha_fin,'estado'=>$estado], 'method' => 'POST']) !!}
        <div class="form-group col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <button type="submit" id="" class="btn btn-info"><i class="fa fa-print"> Reporte</button></i>
        </div>
        </div>
</div>
{!! Form::close() !!}


