<?php

namespace sisOdonto;

use Illuminate\Database\Eloquent\Model;

class Odontograma extends Model
{
    //declaración de los atributos de la tabla
    protected $table = 'odontograma';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
    	'tipo_sangre',
    	'idpersona',
    	'idobra_social',
        'saldo',
    	'condicion'
    ];
    protected $guarded = [ ];
}
