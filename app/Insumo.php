<?php

namespace sisOdonto;

use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    //declaración de los atributos de la tabla
    protected $table = 'insumo';
    protected $primaryKey = 'idinsumo';
    public $timestamp = false;
    protected $fillable = [
    	'codigo',
    	'nombre',
    	'stock',
    	'stock_min',
    	'estado',
        'vencimiento',
        'unidad',
        'updated_at',
        'created_at',
    	'descripcion'
    ];
    protected $guarded = [ ];
}