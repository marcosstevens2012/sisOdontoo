<?php

namespace sisOdonto;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    // //declaración de los atributos de la tabla
    protected $table = 'pais';
    protected $primaryKey = 'idpais';
    public $timestamps = false;
    protected $fillable = [

    	  	'nombre'
    	 
            
    ];
    protected $guarded = [ ];

}
