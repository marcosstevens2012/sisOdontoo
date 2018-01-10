<?php

namespace sisOdonto;

use Illuminate\Database\Eloquent\Model;

class Mecanico extends Model
{
    //declaración de los atributos de la tabla
    protected $table = 'mecanico';
    protected $primaryKey = 'idmecanico';
    public $timestamps = false;
    protected $fillable = [
    	'idciudad',
        'idcontacto',
    	'idpersona'
    	 
    ];
    protected $guarded = [ ];
}
