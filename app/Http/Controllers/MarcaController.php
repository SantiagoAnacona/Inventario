<?php

namespace App\Http\Controllers;

use App\Models\marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    public function registerMarca(Request $request) {
        $request->validate([
            'descripcion' => 'required',
            'nombre' => 'required'
        ]);
    }
    public function index()
    {
        $marca = Marca::all();
        return $marca;
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
        $marca = new Marca();
        $marca->descripcion = $request->descripcion;
        $marca->nombre = $request->nombre;
        $marca->save();

        return response()->json([
            "status" => 1,
            "msg" => "¡Registro de marca exitoso!",
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function show(marca $marca)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function edit(marca $marca)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, marca $marca)
    {
        $marca=Marca::findOrFail($request->id);
        $marca->descripcion = $request->descripcion;
        $marca->nombre = $request->nombre;
        $marca->save();

        return response()->json([
            "status" => 1,
            "msg" => "¡Actualizacion de marca exitosa!",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $marca=Marca::destroy($request->id);
        return $marca;
    }
}
