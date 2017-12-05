<?php

namespace sisOdonto;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    //declaración de los atributos de la tabla
    protected $table = 'persona';
    protected $primaryKey = 'idpersona';
    public $timestamps = false;
    protected $fillable = [
    	'nombre',
        'apellido',
        'idtipodo_cumento',
    	'documento',
    	'nacimiento',
    	'telefono',
    	'email',
    	'idciudad',
    	'direccion',
    	'contradicciones',
    	'condicion'
    ];
    protected $guarded = [ ];
}
