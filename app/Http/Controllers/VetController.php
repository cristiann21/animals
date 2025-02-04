<?php

namespace App\Http\Controllers;

use App\Models\Vet;
use Illuminate\Http\Request;


class VetController extends Controller
{
 
    public function index()
    {
        $vets = Vet::all();
        return view('vet.index', compact('vets'));    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
      return view('vet.create');
    }

    public function mostrar(){
        
      return view('vet.mostrar');
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

      //Verificar que el nombre no este dentro de la BD 
    //  $name =  $request('name');
    //  $v = Vet::where('name', $name)->get();
     // if(sizeof($v) != 0){
      //  return redirect()->route('vet.create')->with('error', 'El veterinario ya existe');
       // }
       
      //Validar datos
     $request->validate([
       'name' => 'required|min:3|unique:vets,name',
        'email' => 'required|email',
        'phone' => 'required|integer'
        ]);

      Vet::create($request->all());
     //return redirect()->route('vet.index');
      return redirect()->route('vet.index')->with('exito', 'Veterinario creado exitosamente!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Vet $vet)
    {
       
      return view('vet.show', compact('vet'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vet $vet)
    {
        
      return view('vet.edit', compact('vet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vet $vet)
    {
       
       // Validar los datos
    $request->validate([
      'name' => 'required|string|max:255',
      'email' => 'required|email|unique:vets,email,' . $vet->id,
      'phone' => 'required|string|max:15',
      'address' => 'required|string|max:255',
  ]);

  // Actualizar el veterinario
  $vet->update($request->all());

  // Redirigir con mensaje de éxito
  return redirect()->route('vet.index')->with('exito', '¡Veterinario actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vet $vet)
    {
  
      $vet->delete();
    }
}


