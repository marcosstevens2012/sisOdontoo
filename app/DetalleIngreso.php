<?php

namespace sisOdonto;

use Illuminate\Database\Eloquent\Model;

class DetalleIngreso extends Model
{
    //declaración de los atributos de la tabla
    protected $table = 'detalle_ingreso';
    protected $primaryKey = 'iddetalle_ingreso';
    public $timestamp = false;
    protected $fillable = [
    	'idingreso',
    	'idarticulo',
    	'cantidad',
    	'precio_compra',
    	'precio_venta'
    ];
    protected $guarded = [ ];
}
