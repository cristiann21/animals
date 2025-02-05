<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function index()
    {
        $animals = Animal::all();
        return view('animal.index', compact('animals'));    
    }

    public function create()
    {
        return view('animal.create');
    }

    public function store(Request $request)
    {
        // Crear el Animal
        $animal = new Animal();
        $animal->name = $request->input('name');
        $animal->weight = $request->input('weight');
        $animal->age = $request->input('age');
        $animal->description = $request->input('description');
        $animal->save();
    
        // Crear el Owner
        $owner = new Owner();
        $owner->name = $request->input('ownername');
        $owner->phone = $request->input('ownerphone');
        $owner->save();
    
        // Asociar el Animal al Owner
        $owner->animals()->save($animal);
    
        // Redirigir con un mensaje de éxito
        return redirect()->route('animal.index')->with('success', 'Animal creado con éxito');
    }

    public function show(Animal $animal)
    {
        return view('animal.show', compact('animal'));
    }

    public function edit(Animal $animal)
    {
        return view('animal.edit', compact('animal'));
    }

    public function update(Request $request, Animal $animal)
    {
        //$request contiene los datos del formulario
        $animal->update($request->all());
        //reenviamos al index
        return redirect()->route('animal.index')->with('success', 'Animal actualizado con exito');
    }
 
    public function destroy(Animal $animal)
    {
        //Primero eliminar al propietario
        $animal->owner()->delete();
        $animal->delete();
        return redirect()->route('animal.index')->with('success', 'Animal eliminado con exito');
    }
}
