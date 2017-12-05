<?php

namespace sisOdonto;

use Illuminate\Database\Eloquent\Model;

class Profesional extends Model
{
    //declaración de los atributos de la tabla
    protected $table = 'profesional';
    protected $primaryKey = 'idprofesional';
    public $timestamps = false;
    protected $fillable = [
    	'idpersona',
    	'idconsultorio'
    ];
    protected $guarded = [ ];
}
