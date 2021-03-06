<?php

namespace sisOdonto;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    //declaración de los atributos de la tabla
    protected $table = 'pedido';
    protected $primaryKey = 'idpedido';
    public $timestamps = false;
    protected $fillable = [
    	'fecha_hora',
    	'estado',
    	'idmecanico',
    	'observaciones'
    ];
    protected $guarded = [ ];
}
