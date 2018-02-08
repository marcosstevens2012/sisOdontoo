<?php

namespace sisOdonto;

use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    //declaración de los atributos de la tabla
    protected $table = 'detalle_pedido';
    protected $primaryKey = 'iddetalle_pedido';
    public $timestamp = false;
    protected $fillable = [
    	'idpedido',
    	'idpieza',
    	'cantidad'
    	
    ];
    protected $guarded = [ ];
}
