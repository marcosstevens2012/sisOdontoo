<?php

namespace sisOdonto;

use Illuminate\Database\Eloquent\Model;

class Consultorio extends Model
{
    //declaración de los atributos de la tabla
    protected $table = 'consultorio';
    protected $primaryKey = 'idconsultorio';
    public $timestamps = false;
    protected $fillable = [
    	'numero',
    	'piso',
    	'sillas',
    	'estado'
    ];
    protected $guarded = [ ];
}
