<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Group::updateOrCreate(
            ['group' => '1'],
            [
                'year' => '2023',
                'description' => 'Teleco I'
            ]
        );
        Group::updateOrCreate(
            ['group' => '2'],
            [
                'year' => '2023',
                'description' => 'Teleco II'
            ]
        );
        Group::updateOrCreate(
            ['group' => '3'],
            [
                'year' => '2023',
                'description' => 'Informatica I'
            ]
        );

    }
}
