<?php

namespace sisOdonto;

use Illuminate\Database\Eloquent\Model;

class Tipodocumento extends Model
{
    //declaración de los atributos de la tabla
    protected $table = 'tipo_documento';
    protected $primaryKey = 'idtipo_documento';
    public $timestamp = false;
    protected $fillable = [
    	'nombre'
    ];
    protected $guarded = [ ];
}
