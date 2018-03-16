<?php

namespace sisOdonto;

use Illuminate\Database\Eloquent\Model;

class Liquidacion extends Model
{
    //declaración de los atributos de la tabla
    protected $table = 'liquidacion';
    protected $primaryKey = 'idliquidacion';
    public $timestamps = false;
    protected $fillable = [
    	'idpaciente',
        'idmecanico',
    	'idprestacion',
    	'coseguro',
    	'fecha',
    	'idprofesional'    	 
    ];
    protected $guarded = [ ];
}
