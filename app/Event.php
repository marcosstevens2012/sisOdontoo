<?php

namespace sisOdonto;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['title','start_date','end_date'];
}

class Ingreso extends Model
{
    //declaración de los atributos de la tabla
    protected $table = 'events';
    protected $primaryKey = 'id';
    public $timestamp = false;
    protected $fillable = [
    	'title',
    	'start_date',
    	'end_date'
    ];
    protected $guarded = [ ];
}