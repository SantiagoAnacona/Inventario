<?php

namespace App\Http\Controllers;

use App\Models\proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function registerProveedor(Request $request) {
        $request->validate([
            'descripcion' => 'required',
            'nombre' => 'required',
            'direccion' => 'required',
            'telefono' => 'required'
        ]);

    }
    public function index()
    {
        $proveedor = Proveedor::all();
        return $proveedor;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $proveedor = new proveedor();
        $proveedor->descripcion = $request->descripcion;
        $proveedor->nombre = $request->nombre;
        $proveedor->direccion = $request->direccion;
        $proveedor->telefono = $request->telefono;

        $proveedor->save();

        return response()->json([
            "status" => 1,
            "msg" => "¡Registro de proveedor exitoso!",
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function show(proveedor $proveedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function edit(proveedor $proveedor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, proveedor $proveedor)
    {
        $proveedor=Proveedor::findOrFail($request->id);
        $proveedor->descripcion = $request->descripcion;
        $proveedor->nombre = $request->nombre;
        $proveedor->direccion = $request->direccion;
        $proveedor->telefono = $request->telefono;
        $proveedor->save();

        return response()->json([
            "status" => 1,
            "msg" => "¡Actualizacion de proveedor exitosa!",
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $proveedor=Proveedor::destroy($request->id);
        return $proveedor;
    }
}
