<?php

namespace sisOdonto;

use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    //declaración de los atributos de la tabla
    protected $table = 'ingreso';
    protected $primaryKey = 'idingreso';
    public $timestamp = false;
    protected $fillable = [
    	'idproveedor',
    	'tipo_comprobante',
    	'serie_comprobante',
    	'num_comprobante',
    	'fecha_hora',
    	'impuesto',
    	'estado'
    ];
    protected $guarded = [ ];
}
