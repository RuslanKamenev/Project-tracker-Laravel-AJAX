<?php

use Illuminate\Support\Facades\Route;

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
});

Auth::routes();

//Пути для работы постами
Route::get('/', 'ProjectsController@index');
Route::post('/', 'ProjectsController@store');
Route::get('/create', 'ProjectsController@create');
Route::get('{id}', 'ProjectsController@show');
Route::put('{id}', 'ProjectsController@update');
Route::delete('{id}', 'ProjectsController@destroy');
Route::get('{id}/edit', 'ProjectsController@edit');

//Пути для рботы с задачами
$methods = ['index', 'store', 'edit', 'update', 'create', 'destroy'];
Route::resource('/tasks', 'TasksController')->only($methods);
