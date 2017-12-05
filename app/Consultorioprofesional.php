<?php

namespace sisOdonto;

use Illuminate\Database\Eloquent\Model;

class Consultorioprofesional extends Model
{
    //declaración de los atributos de la tabla
    protected $table = 'consultorio_profesional';
    protected $primaryKey = 'idconsultorio_profesional';
    public $timestamps = false;
    protected $fillable = [
    	'idprofesional',
    	'hora_entrada',
    	'hora_salida',
    	'dia',
    	'idconsultorio'
    ];
    protected $guarded = [ ];
}
