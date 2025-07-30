<?php

namespace App\Http\Controllers;

use App\Models\Proveedores;
use Exception;
use Illuminate\Http\Request;

class ProveedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $titulo = 'Proveedores';
        $items = Proveedores::all();
        return view('modules.proveedores.index', compact('titulo', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $titulo = 'Agregar Proveedor';
        return view('modules.proveedores.create', compact('titulo'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $item = new Proveedores();
            $item->nombre = $request->nombre;
            $item->telefono = $request->telefono;
            $item->email = $request->email;
            $item->cp = $request->cp;
            $item->sitio_web = $request->sitio_web;
            $item->notas = $request->notas;
            $item->save();
            return to_route('proveedores')->with("success", "Proveedor agregado con Exito!");
        } catch (Exception $e) {
            return to_route('proveedores')->with("success", "Proveedor agregado con Exito!" . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $titulo = 'Eliminar Proveedor';
        $items = Proveedores::find($id);
        return view('modules.proveedores.show', compact('titulo', 'items'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Proveedores::find($id);
        $titulo = "Editar Proveedores";
        return view('modules.proveedores.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $item = Proveedores::find($id);
            $item->nombre = $request->nombre;
            $item->telefono = $request->telefono;
            $item->email = $request->email;
            $item->cp = $request->cp;
            $item->sitio_web = $request->sitio_web;
            $item->notas = $request->notas;
            $item->save();
            return to_route('proveedores')->with("success", "Proveedor Actualizado con Exito!");
        } catch (Exception $e) {
            return to_route('proveedores')->with("success", "No se pudo Actualizar!" . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $item = Proveedores::find();
            $item->delete();
            return to_route('proveedores')->with("success", "Proveedor Eliminado con Exito!");
        } catch (Exception $e) {
            return to_route('proveedores')->with("success", "No se pudo Eliminar!" . $e->getMessage());
        }
    }
}
