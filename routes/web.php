<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\EventClassController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\SubjectController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::resource('sessions',SessionsController::class);
Route::resource('register',RegisterController::class);
Route::post('do-login',[SessionsController::class,'doLogin'])->name('dologin');
Route::get('go-login',[SessionsController::class,'login'])->name('login');
Route::post('log-out',[SessionsController::class,'logout'])->name('logout')->middleware('auth');
Route::put('edit-user/{id}',[SessionsController::class,'edit'])->name('edit-user')->middleware('auth');
Route::delete('delete-profile-image/{id}',[SessionsController::class,'deleteProfileImage'])->name('delete-image')->middleware('auth');
Route::put('upload-profile-image/{id}',[SessionsController::class,'upload'])->name('up')->middleware('auth');
Route::delete('delete-profile/{id}',[SessionsController::class,'deleteuser'])->name('delete-user')->middleware('auth');

Route::get('/class-go', function () {
    return view('class.class');
})->name('classgo');
Route::get('/goto-admin', function () {
    return view('users.AdminForm');
})->name('admin')->middleware('auth');
Route::get('/goto-profile', function () {
    return view('users.ViewProfile');
})->name('view-profile')->middleware('auth');


Route::get('eventclass-go',[EventClassController::class,'index'])->name('indexclass')->middleware('auth');
Route::get('group-go',[GroupController::class,'index'])->name('indexgroup')->middleware('auth');
Route::get('subject-go',[SubjectController::class,'index'])->name('indexsubject')->middleware('auth');
