<?php

namespace sisOdonto;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    // //declaración de los atributos de la tabla
    protected $table = 'ciudad';
    protected $primaryKey = 'idciudad';
    public $timestamps = false;
    protected $fillable = [
    	  	'nombre',
            'cp',
            'idprovincia'
    ];
    

    public static function ciudades($id){
        return Ciudad::where('idciudad','=',$id)
        ->get();
    }


}
