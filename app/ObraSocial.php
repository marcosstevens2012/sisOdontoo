<?php

namespace sisOdonto;

use Illuminate\Database\Eloquent\Model;

class Obrasocial extends Model
{
    //declaración de los atributos de la tabla
    protected $table = 'obrasocial';
    protected $primaryKey = 'idobrasocial';
    public $timestamp = false;
    protected $fillable = [
    	'nombre',
    	'telefono',
    	'email',
    	'numero',
    	'estado'
    ];
    protected $guarded = [ ];
}
