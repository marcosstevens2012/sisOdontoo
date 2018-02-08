<?php

namespace sisOdonto;

use Illuminate\Database\Eloquent\Model;

class Piezas extends Model
{
    //declaración de los atributos de la tabla
    protected $table = 'pieza';
    protected $primaryKey = 'idpieza';
    public $timestamps = false;
    protected $fillable = [
    	'nombre',
        'descripcion'
    ];
    protected $guarded = [ ];
}
