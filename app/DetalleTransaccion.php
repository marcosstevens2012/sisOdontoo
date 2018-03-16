<?php

namespace sisOdonto;

use Illuminate\Database\Eloquent\Model;

class DetalleTransaccion extends Model
{
    //declaración de los atributos de la tabla
    protected $table = 'detalle_transaccion';
    protected $primaryKey = 'iddetalletransaccion';
    public $timestamps = false;
    protected $fillable = [
    	'idtransaccion',
    	'idprestacion',
    	'idformadepago'
    ];
    protected $guarded = [ ];
}
