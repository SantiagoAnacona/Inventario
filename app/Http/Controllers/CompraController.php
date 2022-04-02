<?php

namespace App\Http\Controllers;

use App\Models\compra;
use Illuminate\Http\Request;

class CompraController extends Controller
{

    public function registerCompra(Request $request) {
        $request->validate([
            'cantidad' => 'required',
            'fecha' => 'required',
            'hora' => 'required',
            'valor_total' => 'required',
        ]);
    }
    public function index()
    {
        $compra = compra::all();
        return $compra;
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
        $compra = new compra();
        $compra->cantidad = $request->cantidad;
        $compra->fecha = $request->fecha;
        $compra->hora = $request->hora;
        $compra->valor_total = $request->valor_total;
        $compra->save();

        return response()->json([
            "status" => 1,
            "msg" => "¡Registro de compra exitoso!",
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function show(compra $compra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function edit(compra $compra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, compra $compra)
    {
        $compra=Compra::findOrFail($request->id);
        $compra->cantidad = $request->cantidad;
        $compra->fecha = $request->fecha;
        $compra->hora = $request->hora;
        $compra->valor_total = $request->valor_total;
        $compra->save();

        return response()->json([
            "status" => 1,
            "msg" => "¡Actualizacion de compra exitosa!",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $compra=Request::destroy($request->id);
        return $compra;
    }
}
