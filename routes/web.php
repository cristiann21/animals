<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\VetController;
use App\Http\Controllers\DBTestController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello',function(){
    return 'Hola mundo';
});

Route::get('user/{id}', function($id){
    return 'El usuario es: '.$id;
    });



Route::resource('/animal', AnimalController::class);

Route::resource('/vet', VetController::class);      
Route::get('/veterinarios', [Vetcontroller::class, 'mostrar']);

Route::get('/dbsearch', [DBTestController::class, 'search'])->name ('dbtest.search');
Route::get('/dbinserts', [DBTestController::class, 'inserts'])->name ('dbtest.inserts');
Route::get('/dbupdates', [DBTestController::class, 'updates'])->name ('dbtest.updates');
Route::get('/dbdelete', [DBTestController::class, 'delete']);
