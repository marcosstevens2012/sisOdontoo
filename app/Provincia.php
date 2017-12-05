<?php

namespace sisOdonto;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    // //declaración de los atributos de la tabla
    protected $table = 'provincia';
    protected $primaryKey = 'idprovincia';
    public $timestamps = false;
    protected $fillable = [

    	  	'nombre',
    	  	'idpais'
            
    ];
    protected $guarded = [ ];


}
