<?php
use sisOdonto\Paciente; 
use sisOdonto\Persona;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(sisOdonto\Persona::class, function (Generator $faker) {

	$faker = Faker\Factory::create('es_ES');
    return [
        'apellido'=>$faker->lastName,
      	'nombre'=>$faker->name,
      	//'fecha_registro'=>$faker->dateTimeBetween($startDate = '-1 month', $endDate = 'now', $timezone = null),
      	'idtipo_documento'=>'1',
        'email'=>$faker->email,
        'idciudad'=>'1',
      	'documento'=>$faker->numberBetween($min = 33, $max = 36)."-".$faker->numberBetween($min = 1111, $max = 999).$faker->numberBetween($min = 1111, $max = 999)."-".$faker->numberBetween($min = 1, $max = 9),
      	'nacimiento'=>$faker->dateTimeThisCentury->format('Ymd'),
      	'contradicciones'=>'observaciones persona',
        'telefono'=>$faker->e164PhoneNumber
    ];
});

$factory->define(sisOdonto\Paciente::class, function (Generator $faker) {

 $faker = Faker\Factory::create('es_ES');
    static $number = 60;
    return [

        'direccion'=>$faker->streetAddress,
      	'idciudad'=>$faker->numberBetween($min = 9307, $max = 9310),
      	'identidad'=>$number++,
      	'telefono1'=>$faker->numberBetween($min = 3755, $max = 3844)."-".$faker->numberBetween($min = 441608, $max = 996632),
      	'telefono2'=>$faker->numberBetween($min = 3755, $max = 3844)."-".$faker->numberBetween($min = 441608, $max = 996632),
      	'email'=>$faker->email,
      	'nota'=>'nota direccion',
      	'estado'=>'Activo'
      	
      	
    ];
});
