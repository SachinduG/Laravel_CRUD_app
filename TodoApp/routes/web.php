<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/todos', function () {
    $data=App\Models\Todo::all();
    return view('todos')->with('todos', $data);
    
});

Route::post('/saveTodo', [TodoController::class, 'save']);

Route::get('/markascompleted/{id}', [TodoController::class, 'updatetodoascompleted']);

Route::get('/markasnotcompleted/{id}', [TodoController::class, 'updatetodoasnotcompleted']);

Route::get('/deletetodo/{id}', [TodoController::class, 'deletetodo']);

Route::get('/updatetodo/{id}', [TodoController::class, 'updatetodo']);

Route::post('/updatetodos', [TodoController::class, 'updatetodos']);