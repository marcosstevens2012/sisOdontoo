<?php

namespace sisOdonto;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    //declaración de los atributos de la tabla
    protected $table = 'proveedor';
    protected $primaryKey = 'idproveedor';
    public $timestamps = false;
    protected $fillable = [
    	'idciudad',
        'idcontacto',
    	'idpersona'
    	 
    ];
    protected $guarded = [ ];
}
