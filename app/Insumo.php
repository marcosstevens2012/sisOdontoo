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
        'updated_at',
        'created_at',
    	'descripcion'
    ];
    protected $guarded = [ ];


    public function incrementStock()
    {
        $this->stock--;
    }

    public function decrementStock()
    {
        $this->verifyStockCanDecrement();
        $this->stock++;
    }

    public function verifyStockCanDecrement()
    {
        if($this->stock <= 0) throw new Exception("Stock can't decrement");
         
    }


class DecrementarInsumo
{
    public function execute($command)
    {
        $prestacionSeleccionada = Prestacion::findOrFail($command->prestacionId());
        $prestacionSeleccionada->incrementStockInsumo($command->insumoId());
        return $prestacionSeleccionada;
    }
}
}