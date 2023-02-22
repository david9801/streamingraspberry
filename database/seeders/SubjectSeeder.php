<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subject::updateOrCreate(
            ['name' => 'Programacion IA'],
            [
                'year' => '2023',
                'description' => 'Programación con python para IA y Machine Learning','teacher' =>'pepe','group_id'=>'1'
            ]
        );
        Subject::updateOrCreate(
            ['name' => 'Programacion IA II'],
            [
                'year' => '2023',
                'description' => 'Programación avanzada','teacher' =>'luis','group_id'=>'2'
            ]
        );
    }
}

