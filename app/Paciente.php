<?php

namespace sisOdonto;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    //declaración de los atributos de la tabla
    protected $table = 'paciente';
    protected $primaryKey = 'idpaciente';
    public $timestamps = false;
    protected $fillable = [
    	'tipo_sangre',
    	'idpersona',
    	'idobra_social',
    	'condicion'
    ];
    protected $guarded = [ ];
}
