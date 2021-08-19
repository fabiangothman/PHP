<?php

namespace Database\Seeders;

//use App\Models\Curso;

use App\Models\Curso;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        
        /*$curso = new Curso();
        $curso->name = "Laravel";
        $curso->description = "El mejor FW!";
        $curso->categoria = "Desarrollo web";
        $curso->save();*/

        //$this->call(CursoSeeder::class);

        //Create 7 random registeres in DB
        Curso::factory(7)->create();
    }
}
