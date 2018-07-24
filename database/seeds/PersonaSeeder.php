<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Provider\DateTime;
use Carbon\Carbon;
use sisOdonto\Persona;

class PersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	
        $faker = Faker\Factory::create('es_ES');

        $limit = 33;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('persona')->insert([ //,
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
            ]);
        }
    

    }
}