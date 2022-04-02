<?php

namespace App\Http\Controllers;

use App\Models\presentacion;
use Illuminate\Http\Request;

class PresentacionController extends Controller
{
    public function registerPresentacion(Request $request) {
        $request->validate([
            'descripcion' => 'required',
            'tipo' => 'required',
            'forma' => 'required'
        ]);

    }
    public function index()
    {
        $presentacion = Presentacion::all();
        return $presentacion;
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
        $presentacion = new presentacion();
        $presentacion->descripcion = $request->descripcion;
        $presentacion->tipo = $request->tipo;
        $presentacion->forma = $request->forma;
        $presentacion->save();

        return response()->json([
            "status" => 1,
            "msg" => "¡Registro de presentacion exitoso!",
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\presentacion  $presentacion
     * @return \Illuminate\Http\Response
     */
    public function show(presentacion $presentacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\presentacion  $presentacion
     * @return \Illuminate\Http\Response
     */
    public function edit(presentacion $presentacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\presentacion  $presentacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, presentacion $presentacion)
    {
        $presentacion=Presentacion::findOrFail($request->id);
        $presentacion->descripcion = $request->descripcion;
        $presentacion->tipo = $request->tipo;
        $presentacion->forma = $request->forma;
        $presentacion->save();

        return response()->json([
            "status" => 1,
            "msg" => "¡Actualizacion de presentacion exitosa!",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\presentacion  $presentacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $presentacion=Presentacion::destroy($request->id);
        return $presentacion;
    }
}
