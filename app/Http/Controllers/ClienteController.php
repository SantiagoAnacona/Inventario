<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller

{
    public function registerCliente(Request $request) {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'identificacion' => 'required',
            'tipo' => 'required',
            'direccion' => 'direccion',
            'telefono' => 'telefono',
        ]);

    }

    public function index()
    {
        $cliente = Cliente::all();
        return $cliente;
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
        $cliente = new Cliente();
        $cliente->nombre = $request->nombre;
        $cliente->apellido = $request->apellido;
        $cliente->identificacion = $request->identificacion;
        $cliente->tipo = $request->tipo;
        $cliente->direccion = $request->direccion;
        $cliente->telefono = $request->telefono;
        $cliente->save();

        return response()->json([
            "status" => 1,
            "msg" => "¡Registro de cliente exitoso!",
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cliente $cliente)
    {
        $cliente=Cliente::findOrFail($request->id);
        $cliente->nombre = $request->nombre;
        $cliente->apellido = $request->apellido;
        $cliente->identificacion = $request->identificacion;
        $cliente->tipo = $request->tipo;
        $cliente->direccion = $request->direccion;
        $cliente->telefono = $request->telefono;
        $cliente->save();

        return response()->json([
            "status" => 1,
            "msg" => "¡Actualizacion de cliente exitosa!",
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $cliente=Cliente::destroy($request->id);
        return $cliente;
    }
}
