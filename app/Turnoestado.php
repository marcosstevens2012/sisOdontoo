<?php

namespace sisOdonto;

use Illuminate\Database\Eloquent\Model;

class Turnoestado extends Model
{
    //declaración de los atributos de la tabla
    protected $table = 'turno_estado';
    protected $primaryKey = 'id_turnoestado';
    public $timestamps = false;
    protected $fillable = [
        'idturno',
    	'idestado_turno',
        'inicio',
        'fin',
    	'observaciones'
    ];
    protected $guarded = [ ];
}
