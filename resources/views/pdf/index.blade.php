@extends('layouts.admin')
@section('contenido')
<div class="row">
            <div class="col-xs-12">
              <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title">REPORTES DEL SISTEMA</h3>
                  <div class="box-tools">
                    <div class="input-group" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                 <table class="table table-striped table-bordered table-condensed table-hover">
                  <thead>
                    <th>Fecha</th>
                    <th>Proveedor</th>
                    <th>Comprobante</th>
                    <th>Impuesto</th>
                    <th>Total</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                  </thead>
                  <!-- bucle -->
                  @foreach ($ingresos as $ing)
                  <tr>
                    <td>{{$ing->fecha_hora}}</td>
                    <td>{{$ing->nombre}}</td>
                    <td>{{$ing->tipo_comprobante.': '.$ing->serie_comprobante.'-'.$ing->num_comprobante}}</td>
                    <td>{{$ing->impuesto}}</td>
                    <td>{{$ing->total}}</td>
                    <td>{{$ing->estado}}</td>
                    <td>
                      <a href="{{URL::action('PdfController@show', $ing->idproveedor)}}"><button class="btn btn-info"> Ver</button></a>
                      
                    </td>
                  </tr>
                 
                  @endforeach
                  
                </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
 </div>

 {!!Form::close()!!}  
    @push ('scripts')
   
    @endpush
    @endsection