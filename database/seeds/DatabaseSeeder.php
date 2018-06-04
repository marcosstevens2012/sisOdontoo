<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PrestacionesSeeder::class);
        $this->call(CreateUsersTable::class);
        //$this->call(ProfesionalSeeder::class);
        //$this->call(ObrasocialSeeder::class);
        //$this->call(TurnoSeeder::class);
    }
}
