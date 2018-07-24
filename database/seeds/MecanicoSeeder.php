<?php

use Illuminate\Database\Seeder;

class PacienteSeeder extends Seeder
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
        static $number = 46;
        for ($i = 0; $i < $limit; $i++) {
            DB::table('paciente')->insert([ //,
                'idobra_social'=>'1',
		      	'idpersona'=>$number++,
		      	'tipo_sangre'=>'A−',
		      	'condicion'=>'Activo',
		      	'contradicciones'=>'TOMA MEDICAMENTOS',
		      	'carnet'=>$faker->numberBetween($min = 100000, $max = 900000)
		      	
            ]);
        }
    

    }
}
