<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $titulo = "Usuarios";
        $items = User::all();
        return view("modules.usuarios.index", compact('titulo', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $titulo = "Crear Usuario";
        return view('modules.usuarios.create', compact('titulo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'activo' =>true,
            'rol' => $request->rol
        ]);

        return to_route('usuarios')->with('success', 'Usuario guardado  con Exito!');

        } catch (Exception $e) {
            return to_route('usuarios')->with('success', 'No se pudo guardar el Usuario!' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $titulo = "Editar Usuario";
        $item = User::find($id);
        return view('modules.usuarios.edit', compact('titulo', 'item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $item = User::find($id);
            $item->name = $request->name;
            $item->email = $request->email;
            $item->rol = $request->rol;
            $item->save();
            return to_route('usuarios')->with('success', 'Usuario actualizado con Exito!');
        } catch (Exception $e) {
            return to_route('usuarios')->with('success', 'Error al actualizar el usuario!' . $e->getMessage());
        }    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function tbody()
    {
        $items = User::all();
        return view('modules.usuarios.tbody', compact('items'));
    }

    public function estado($id, $estado)
    {
        $item = User::find($id);
        $item->activo = $estado;
        return $item->save();
    }

    
}
