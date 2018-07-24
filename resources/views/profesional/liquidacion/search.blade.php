{!! Form::open(array('url'=>'liquidacion/liquidacion', 'method'=>'GET', 'autcomplete'=>'off', 'role'=>'search'))!!}
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
                                                        <option value="{{$obrasocial}}">Seleccione Obra Social</option>
                                                    @foreach($obra as $obr)
                                                            <option value="{{$obr->idobrasocial}}">{{$obr->nombre}}</option>
                                                    @endforeach
                                                    </select>    
                                              </div>
                                    </div>
                                    <input type="hidden" name="pro" id="pro" value="{{$profesionales}}">
                                    <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                                                <div class="form-group">
                                                    <h4>Profesional</h4>
                                                    <select name="profesional" id="profesional" class="estado form-control selectpicker data-live-search">
                                                        <option value="{{$profesionales}}"  selected="true">Profesional</option>
                                                    @if ($profesionales=="")
                                                        <option value=""  selected="true">Seleccione</option>
                                                    @endif
                                                        @foreach($profesional as $pro)
                                                            <option value="{{$pro->idprofesional}}">{{$pro->nombre}} {{$pro->apellido}}</option>
                                                        @endforeach
                                                    </select>
                                              </div>
                                    </div>

                                    <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                                                <div class="form-group">
                                                    <h4>Estado</h4>
                                                    <select name="estado" id="estado" class="estado form-control selectpicker data-live-search">
                                                        <option value="{{$estado}}">Seleccione Estado</option>
                                                             <option value="1">Liquidado</option>
                                                             <option value="0">No liquidado</option>
                                                    </select> 
                                              </div>
                                    </div>
                    
                                    <div class="form-group col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                        <h4>Buscar </h4>
                                        <span class="input-group-btn"><button type="submit" class="btn btn-primary">Buscar</button></span>

                                    </div>

                                   
                         </div>  
                    </div>
    

{{Form::close()}}


{!! Form::open(['route' => ['liquidacion.pdfliquidaciones.store', 'searchText' =>$searchText,'fecha_inicio'=>$fecha_inicio,'fecha_fin'=>$fecha_fin,'estado'=>$estado, 'obra'=>$obra, 'profesionales'=>$profesionales, 'paciente'=>$paciente], 'method' => 'POST']) !!}
        <div class="form-group col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <button type="submit" id="" class="btn btn-info"><i class="fa fa-print"> Reporte</button></i>
        
</div>
{!! Form::close() !!}
@include('profesional.liquidacion.modal')
<a href="" data-target="#modal-delete" data-toggle="modal"><button class="btn btn-primary" id="consumir" style="">Liquidar Todo</button></a>



