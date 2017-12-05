<?php

namespace sisOdonto;

use Illuminate\Database\Eloquent\Model;

class Prestacioninsumo extends Model
{
    //declaración de los atributos de la tabla
    protected $table = 'prestacion_insumo';
    protected $primaryKey = 'idprestacion';
    public $timestamp = false;
    protected $fillable = [
    	'idinsumo',
    	'cantidad'
    ];
    protected $guarded = [ ];
}
