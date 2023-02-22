<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate(
            ['email' => 'lucia@mail.com'],
            [
                'name' => 'Lucia Noguera',
                'password' => Hash::make('123456'),
            ]
        );

        User::updateOrCreate(
            ['email' => 'david@mail.com'],
            [
                'name' => 'David Hermo',
                'password' => Hash::make('123456'),
            ]
        );
    }
}
