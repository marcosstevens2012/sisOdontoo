<?php

namespace sisOdonto;

use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    //declaración de los atributos de la tabla
    protected $table = 'turno';
    protected $primaryKey = 'idturno';
    public $timestamps = true;
    protected $fillable = [
        'idpaciente',
    	'idconsultorio',
    	'idprofesional',
    	'idestado',
    	'hora_inicio',
    	'hora_fin',
    	'tiempo_at',
    	'asistencia',
    	'observaciones',
    	'fecha'
    ];
    protected $guarded = [ ];
}
