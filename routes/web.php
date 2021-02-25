<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/todos','App\Http\Controllers\todosController@index');
Route::get('/todos/{todo}','App\Http\Controllers\todosController@showTodo');
Route::get('/create','App\Http\Controllers\todosController@create');
Route::post('/create', 'App\Http\Controllers\todosController@store');
Route::get('/todos/{todo}/edit','App\Http\Controllers\todosController@edit');
Route::post('/todos/{todo}','App\Http\Controllers\todosController@update');
Route::get('/todos/{todo}/delete','App\Http\Controllers\todosController@destroy');
Route::get('/todos/{todo}/complete','App\Http\Controllers\todosController@complete');


