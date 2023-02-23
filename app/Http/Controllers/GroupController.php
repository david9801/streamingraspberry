<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
class GroupController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        $groups = $user->groups()->get();
        return view('class.group', ['groups' => $groups]);
    }


}
