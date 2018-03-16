<?php

namespace sisOdonto;

use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    //declaración de los atributos de la tabla
    protected $table = 'transaccion';
    protected $primaryKey = 'idtransaccion';
    public $timestamp = false;
    protected $fillable = [
    	'idpaciente',
    	'total_transaccion',
    	'fecha_hora',
    	'estado'
    ];
    protected $guarded = [ ];
}
