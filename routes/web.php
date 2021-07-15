<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodosController;

/*
|--------------------------------------------------------------------------
| Todos Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [TodosController::class, 'todo'])->name('todos');
Route::post('/create', [TodosController::class, 'create'])->name('create');
Route::get('/update/{id}', [TodosController::class, 'updatePage'])->name('update');
Route::post('/update/{id}', [TodosController::class, 'update'])->name('update');
Route::post('/delete/{id}', [TodosController::class, 'destroy'])->name('delete');