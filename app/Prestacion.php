<?php

namespace sisOdonto;

use Illuminate\Database\Eloquent\Model;

class Prestacion extends Model
{
    //declaración de los atributos de la tabla
    protected $table = 'prestacion';
    protected $primaryKey = 'idprestacion';
    public $timestamp = false;
    protected $fillable = [
    	'nombre'
    ];
    protected $guarded = [ ];
}
