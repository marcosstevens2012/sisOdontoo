{!! Form::open(array('url'=>'profesional/liquidacion', 'method'=>'GET', 'autcomplete'=>'off', 'role'=>'search'))!!}
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
                                                    <h4>Obra Social</h4>
                                                    <select name="idobra_social" id="idobra_social" class="form-control selectpicker" data-live-search="true">
                                                        <option value="">Seleccione Obra Social</option>
                                                    @foreach($obra as $obr)
                                                            <option value="{{$obr->idobrasocial}}">{{$obr->nombre}}</option>
                                                    @endforeach
                                                    </select>    
                                              </div>
                                    </div>

                                    <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                                                <div class="form-group">
                                                    <h4>Profesional</h4>
                                                    <select name="profesional" id="profesional" class="idpaciente form-control selectpicker data-live-search">
                                                        <option value="">Seleccione Profesional</option>
                                                             @foreach($profesional as $pro)
                                                                <option value="{{$pro->idprofesional}}">{{$pro->apellido . " " . $pro->nombre}}</option>
                                                             @endforeach
                                                    </select> 
                                              </div>
                                    </div>

                                    <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                                                <div class="form-group">
                                                    <h4>Paciente</h4>
                                                    <select name="paciente" id="paciente" class="idpaciente form-control selectpicker data-live-search">
                                                        <option value="">Seleccione Paciente</option>
                                                             @foreach($paciente as $per)
                                                                <option value="{{$per->idpaciente}}">{{$per->apellido . " " . $per->nombre . " " . $per->documento}}</option>
                                                             @endforeach
                                                    </select> 
                                              </div>
                                    </div>
                                    <div class="form-group col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                        <h4>Buscar </h4>
                                        <input type="text" class="form-control" id="searchText" name="searchText" value="{{$searchText}}" placeholder="Numero de orden, etc." >
                                        
                                    </div>
                                    <div class="form-group col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                        <h4>Buscar </h4>
                                        <span class="input-group-btn"><button type="submit" class="btn btn-primary">Buscar</button></span>

                                    </div>
                         </div>  
                    </div>
    

{{Form::close()}}


{!! Form::open(['route' => ['liquidacion.pdfliquidaciones.store', 'searchText' =>$searchText,'fecha_inicio'=>$fecha_inicio,'fecha_fin'=>$fecha_fin,'estado'=>$estado, 'obra'=>$obra, 'profesional'=>$profesional, 'paciente'=>$paciente], 'method' => 'POST']) !!}
        <div class="form-group col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <button type="submit" id="" class="btn btn-info"><i class="fa fa-print"> Reporte</button></i>
        </div>
        </div>
</div>
{!! Form::close() !!}


