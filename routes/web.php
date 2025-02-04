<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\VetController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello',function(){
    return 'Hola mundo';
});

Route::get('user/{id}', function($id){
    return 'El usuario es: '.$id;
    });


Route::get('/animals/{id}/edit', [AnimalController::class, 'edit'])->name('animal.edit');
Route::put('/animals/{id}', [AnimalController::class, 'update'])->name('animal.update');
Route::get('/vets/{id}/edit', [VetController::class, 'edit'])->name('vet.edit');
Route::put('/vets/{id}', [VetController::class, 'update'])->name('vet.update');
Route::resource('/animal', AnimalController::class);
Route::resource('/vet', VetController::class);
//Le digo que cuando visite mi url/veterinario ejecutara el metodo mostrar de VetController         
ROute::get('/veterinarios', [Vetcontroller::class, 'mostrar']);       
//Route::get('/animal', [AnimalController::class, 'index']);
//Route::get('/animal/{id}', [AnimalController::class, 'show']);º