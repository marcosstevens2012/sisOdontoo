<?php

namespace sisOdonto;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    //declaración de los atributos de la tabla
    protected $table = 'contacto';
    protected $primaryKey = 'idcontacto';
    public $timestamp = false;
    protected $fillable = [
    	'direccion',
    	'telefono'
    ];
    protected $guarded = [ ];
}
