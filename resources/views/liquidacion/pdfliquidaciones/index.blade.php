@extends('layouts.admin')
@section('contenido')
                
            <section id="main-content">
                <div class="row">
                    <div class="col-md-12">
                        
                        <!--breadcrumbs start -->
                        <ul class="breadcrumb">
                            <li><a href="inicio/inicio">Principal</a>
                            </li>
                             <li><a href="turno/turno">Turnos</a> </li>
                             </li>
                             <li class="active">Reporte</li>
                        </ul>

                        <!--breadcrumbs end -->
                        <h1 class="h1">Filtros Reporte Estado de Producción</h1>
                        
                    </div>
                </div>
                {!! Form::open(array('url'=>'turno/pdfgeneral', 'method'=>'POST', 'autocomplete'=>'off', 'files'=>'true'))!!}
                {{Form::token()}}
                <div class="row">
                    <div class="col-md-12">
                         
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">Seleccione los Filtros para Realizar el Reporte</h3>                
                            </div>
                      
                            <div class="panel-body">
                                    <div class="form-group col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                                <label class="control-label">Fecha Desde:</label>
                                                <div >
                                                    <input type="date" class="form-control " required  name="fecha_inicio" id="fecha_inicio" >
                                                </div>
                                    </div>

                                     
                                    <div class="form-group col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                                <label class="control-label">Fecha Hasta:</label>
                                                <div >
                                                    <input type="date" class="form-control " required name="fecha_fin" id="fecha_fin">
                                                </div>
                                            </div>
                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <label class="control-label" >Estado de Turno</label>
                                                    <select name="estado_t" id="estado_t" class="estado_t form-control selectpicker" data-live-search="true">
                                                    <option value="" disabled="true" selected="true">Seleccione</option>
                                                              
                                                    <option value="1">Pendiente</option>

                                                    <option value="2">Finalizado</option>  
                                                     
                                                    <option value="3">Cancelado</option> 

                                                    <option value="4">Todos</option>   
                                                    </select>    
                                              </div>
                                    </div>

                                    <div class="form-group ">
                                        <div class="col-sm-offset-8 col-sm-12">
                                            <button type="submit" class="btn btn-primary">Aceptar</button>
                                            <button type="reset" class="btn btn-danger">Cancelar</button>
                                        </div>
                                        

                                    </div>
                                    

                              
                            </div>
                             
                        </div>
                        
                    </div>


                </div>
                {!!Form::close() !!}
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="{{asset('js/jQuery-3.1.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery-3.2.0.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.mask.min.js')}}"></script>
    
