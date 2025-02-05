<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\AnimalController;

class DBTestController extends Controller
{
    public function inserts() {
        //1. Metodo
        /*$v = new Vet();
        $v->name = 'John';
        $v->phone = '1234567890';
        $v->email = 'john@example.com';
        $v->save();
        */

        //2. Metodo 
        $v = Vet::create([
            'name' => 'John',
            'phone' => '1234567890',
            'email' => 'john@example.com'
        ]);
        return "Insertado vet con id : $v->id";
    }

    public function search(){
        //1. Busqueda con clausulas where:animales con nombre =
        $animals = Animal::where('name', 'Nuevo')->get();
        foreach ( $animals as $animal ) {
            echo $animal->name; "-" . $animal->weight . "<br>";
        }

        //2. Buscar animals con peso superior a 3 
        echo "<h3> Animales con peso superior a 3</h3>";
        $animals = Animal::where('weight', '>', 3)->get();
        foreach ( $animals as $animal ) {
            echo $animal->name; "-" . $animal->weight . "<br>";
        }

        //3. Buscar animales con peso superior a 3 y menor a 7
        echo "<h3> Animales con peso superior a 3 y menor a 7</h3>";
        $animals = Animal::where([
            ['weight', '>', 3],
            ['weight', '<', 7]
            ])->get();
        foreach ( $animals as $animal ) {
            echo $animal->name; "-" . $animal->weight . "<br>";
        
          }
        //4. Buscar los animales con un nombre que contenga la "a"
        echo "<h3> Animales con un nombre que contenga la 'a'</h3>";
        $animals = Animal::where('name', 'like', '%a%')->get();
        foreach ( $animals as $animal ) {
        echo $animal->name; "-" . $animal->weight . "<br>";
          }

        // 5. Buscar animales con peso menor o igual a 5 y edad mayor o igual a 1 (con or)
        echo "<h3> Animales con peso menor o igual a 5 y edad mayor o igual a 1</h3>";
        $animals = Animal::where( 
        'weight', '<=', 5)
        ->orwhere('age', '>=', 'desc')
        ->get();
        foreach ( $animals as $animal ) {
            echo $animal->name; "-" . $animal->weight . "<br>";
            }
    }
    public function update(){
        //1. Busco un elemento por id y le cambio el nombre
        $animal = Animal::find(1);
        $animal->name = "Tobby";
        $animal->save();

        //2.modificar todos los animales que pesen menso de 5 kilos poner en sus descrpcion "menos de 5kg"
        $animals = Animal::where('weight', '<', 5)->get();
        foreach ( $animals as $animal ) {
            $animal->description = "menos de 5kg";
            $animal->save();
        }
    }
    public function delete(){
        //1. Eliminar un animal por id (7)
        $animal->destroy(7);

        //2. Eliminar con condiciones: eliminar los animales con peso > 40
        Animal::where('weight', '>', 40)->delete();
        return "Eliminados";
    }
}
