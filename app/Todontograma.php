<?php

namespace sisOdonto;

use Illuminate\Database\Eloquent\Model;

class Todontograma extends Model
{
    //declaración de los atributos de la tabla
    protected $table = 'todontograma';
    protected $primaryKey = 'codigoOdontograma';
    public $timestamps = false;
    protected $fillable = [
    	
    ];
    protected $guarded = [ ];
}
