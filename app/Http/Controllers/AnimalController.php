<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $animals = Animal::all();
        return view('animal.index', compact('animals'));    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('animal.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $animal = Animal::create($request->all());
        return redirect()->route('animal.index')->with('success', 'Animal creado con exito');

        //Despues tengo que crear el propietario
        // opcion 1 crear un objeto owner, meterle es sus atributos los datos del formulario , guardar en la base de datos
        $owener = new Owner();
        $owener->name = $request->input('ownername');        
        $owener->phone = $request->input('ownerphone');
        $owner->animal()->save($animal);
        $owner->save();

        return redirect()->route('animal.index')->with('success', 'Animal creado con exito');


    }

    /**
     * Display the specified resource.
     */
    public function show(Animal $animal)
    {
        return view('animal.show', compact('animal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Animal $animal)
    {
        return view('animal.edit', compact('animal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Animal $animal)
    {
        //$request contiene los datos del formulario
        $animal->update($request->all());
        //reenviamos al index
        return redirect()->route('animal.index')->with('success', 'Animal actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Animal $animal)
    {
        //Primero eliminar al propietario
        $animal->owner()->delete();
        $animal->delete();
        return redirect()->route('animal.index')->with('success', 'Animal eliminado con exito');
    }
}
