<?php

namespace sisOdonto;

use Illuminate\Database\Eloquent\Model;

class Prestacionprofesional extends Model
{
    //declaración de los atributos de la tabla
    protected $table = 'prestacion_profesional';
    protected $primaryKey = 'idprestacionprof';
    public $timestamps = false;
    protected $fillable = [
    	'idprofesional',
    	'tiempo',
    	'costo'
    ];
    protected $guarded = [ ];
}