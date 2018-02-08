<?php

namespace sisOdonto;

use Illuminate\Database\Eloquent\Model;

class PrestacionObrasocial extends Model
{
    //declaración de los atributos de la tabla
    protected $table = 'prestacion_obrasocial';
    protected $primaryKey = 'idprestacionprof';
    public $timestamps = false;
    protected $fillable = [
    	'idprofesional'
    ];
    protected $guarded = [ ];
}