<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SubjectController extends Controller
{
    public function index()
    {
        //metodo index para que un profesor cree una asignatura/curso
        return view('teacher.uploadSubject');
    }

    public function create(Request $request)
    {
        //metodo create para que un profesor  cree/añada una asignatura a la plataforma
        //validamos los datos de entrada de un curso
        //nombre y temas
        $request->validate([
            'name' => 'required|max:25|unique:subjects,name',
            'temas' => 'required|integer|between:1,1000',
            'archivo' => 'mimes:ppt,pptx,pdf'
        ],
            [
                'name.required' => 'Por favor, escribe un nombre para el curso',
                'temas.required' => 'Por favor, indica cuántos temas tiene el curso',
                'temas.integer' => 'Por favor, escribe un numero entero de temas',
                'temas.between' => 'Por favor, escribe una cantidad entre 1 y 1000 temas',
                'name.unique' => 'Lo sentimos!El nombre del curso ya existe, pruebe otro parecido!',
                'archivo.mimes' => 'Por favor, sube un archivo en formato pdf,ppt o pptx'
            ]);
        //añadimos la asignatura a nuestra bbdd
        $subject = new Subject();
        $subject->name = $request->name;
        $subject->temas = $request->temas;
        $subject->description = $request->description;
        if ($request->hasFile('archivo')) {
            $archivo = $request->file('archivo');
            $filename = $archivo->getClientOriginalName();
            $path = $archivo->storeAs('public/', $filename);
            // Actualizo el nombre de archivo en la base de datos
            $subject->archivo = $filename;
        }
        //le pasamos el user_id a la tabla cursos para saber que cursos ha subido cada profesor
        $subject->user_id = Auth::user()->id;
        $subject->save();
        return redirect()->back();
    }
}

