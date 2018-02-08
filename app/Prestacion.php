<?php

namespace sisOdonto;

use Illuminate\Database\Eloquent\Model;

class Prestacion extends Model
{
    //declaración de los atributos de la tabla
    protected $table = 'prestacion';
    protected $primaryKey = 'idprestacion';
    public $timestamp = false;
    protected $fillable = [
    	'nombre'
    ];
    protected $guarded = [ ];

	public function insumos()
	{
		return $this->belongsToMany(
			Insumo::class, 
			'prestacion_insumos', 
			'prestacion_id', 
			'insumo_id'
		);
	}

	public function incrementStockInsumo($insumoId)
	{
		return $this->findInsumoOrFail($insumoId)
			->incrementStock()
			->save();
	}

	protected function findInsumoOrFail($insumoId)
	{
		return $this->insumos()
			->where('id', $insumoId)
			->first() ?: new Exception("InsumoNotFound");
	}


}