<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::updateOrCreate([
            'name' => 'Lucia Noguera',
            'email' => 'lucia99@notmail.es',
            'password' => Hash::make('123456')
        ]);
        $role = Role::where('name', 'teacher')->first();
        $user->assignRole($role);

        $user = User::updateOrCreate([
            'name' => 'David Hermo',
            'email' => 'david98@notmail.es',
            'password' => Hash::make('123456')
        ]);
        $role = Role::where('name', 'teacher')->first();
        $user->assignRole($role);

        $user = User::updateOrCreate([
            'name' => 'Juan de Dios',
            'email' => 'juan00@notmail.es',
            'password' => Hash::make('123456')
        ]);
        $role = Role::where('name', 'student')->first();
        $user->assignRole($role);

        $user = User::updateOrCreate([
            'name' => 'Maca',
            'email' => 'maca@notmail.es',
            'password' => Hash::make('123456')
        ]);
        $role = Role::where('name', 'student')->first();
        $user->assignRole($role);
    }
}
