<?php

namespace sisOdonto;

use Illuminate\Database\Eloquent\Model;

class Preliquidacion extends Model
{
    //declaración de los atributos de la tabla
    protected $table = 'preliquidacion';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
    	'idpaciente'   	 
    ];
    protected $guarded = [ ];
}
