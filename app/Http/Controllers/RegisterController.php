<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create(){
        return view('users.RegisterForm');
    }
    public function createTeacher(){
        return view('users.RegisterFormTeacher');
    }
    public function store(Request $request)
    {
        //valido el registro;
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|max:30'
        ], [
            'name.required' => 'El nombre es obligatorio',
            'name.unique' => 'El nombre ya está en uso',
            'email.required' => 'El correo electrónico es obligatorio',
            'email.email' => 'El correo electrónico no es válido',
            'email.unique' => 'El correo electrónico ya está en uso',
            'password.required' => 'La contraseña es obligatoria',
            'password.max' => 'La contraseña no debe tener más de :max caracteres'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        //defino los roles admin y user
        //para usar los roles:
        //composer require spatie/laravel-permission
        //creo la tabla php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider" --tag="migrations"
        //php artisan migrate
        //y luego
       //ejecuto los seeders previamente creados
        //php artisan db.seed
        //creo el user a partir de su modelo
        $user=new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        //guardo el user
        $user->save();
        //asigno a user el rol de estudiante gracias a spatie (roles)
        $user->assignRole('student');
        auth()->login($user);
        return redirect()->route('welcome');
    }
    public function storeTeacher(Request $request)
    {
        //valido el registro de entrada, es decir, los inputs;
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|max:30'
        ], [
            'name.required' => 'El nombre es obligatorio',
            'name.unique' => 'El nombre ya está en uso',
            'email.required' => 'El correo electrónico es obligatorio',
            'email.email' => 'El correo electrónico no es válido',
            'email.unique' => 'El correo electrónico ya está en uso',
            'password.required' => 'La contraseña es obligatoria',
            'password.max' => 'La contraseña no debe tener más de :max caracteres'
        ]);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        //creo el usuario a partir del modelo User
        $user=new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        //guardo el user
        $user->save();
        //le asigno el rol de profesor
        $user->assignRole('teacher');
        auth()->login($user);
        return redirect()->route('welcome');
    }
}
