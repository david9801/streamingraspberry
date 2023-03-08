<?php

namespace Database\Seeders;

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
        //creamos los seeds para trabajar mejor al desarrollar el servicio
        //importa el orden, por eso primero los roles antes que el user
        $this->call([
            RolesTableSeeder::class,
            UserSeeder::class
        ]);
    }
}
