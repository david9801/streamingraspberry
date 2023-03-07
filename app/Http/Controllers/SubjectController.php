<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Inscripcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    public function index()
    {
        //metodo index para que un profesor cree una asignatura/curso
        return view('teacher.Subject');
    }


    public function showmycursos()
    {
        // Obtén el usuario actual
        $user = Auth::user();
        //inscripciones del usuario actual, que viene dado por la funcion de la relacion
        //hasmany del modelo user
        $inscripciones = $user->inscripcions;
        return view('class.MisCursos')->with('inscripciones', $inscripciones);
    }


    public function create(Request $request)
    {
        //metodo create para que un profesor  cree/añada una asignatura a la plataforma
        //validamos los datos de entrada de un curso
        //nombre y temas
        $request->validate([
            'name' => 'required|max:25|unique:cursos,name',
            'temas' => 'required|integer|between:1,1000',
            'archivo' => 'required|mimes:ppt,pptx'
        ],
            [
                'name.required' => 'Por favor, escribe un nombre para el curso',
                'temas.required' => 'Por favor, indica cuántos temas tiene el curso',
                'name.unique' => 'Lo sentimos!El nombre del curso ya existe, pruebe otro parecido!',
                'archivo.mimes' => 'Por favor, sube un archivo en formato PDF'
            ]);
        //añadimos la asignatura a nuestra bbdd
        $curso=new Subject();
        $curso->name = $request->name;
        $curso->temas = $request->temas;
        if ($request->hasFile('archivo'))
        {
            $archivo = $request->file('archivo');
            $filename = $archivo->getClientOriginalName();
            $path = $archivo->storeAs('public/', $filename);
            // Actualizo el nombre de archivo en la base de datos
            $curso->archivo = $filename;
        }
        //le pasamos el user_id a la tabla cursos para saber que cursos ha subido cada profesor
        $curso->user_id = Auth::user()->id;
        $curso->save();
        return redirect()->back();
    }
}
