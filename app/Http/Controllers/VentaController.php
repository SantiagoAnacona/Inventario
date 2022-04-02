<?php

namespace App\Http\Controllers;

use App\Models\venta;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function registerVenta(Request $request) {
        $request->validate([
            'cantidad' => 'required',
            'fecha' => 'required',
            'hora' => 'required',
            'valor_venta' => 'required',
        ]);
    }
    public function index()
    {
        $venta = Venta::all();
        return $venta;
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
        $venta = new venta();
        $venta->cantidad = $request->cantidad;
        $venta->fecha = $request->fecha;
        $venta->hora = $request->hora;
        $venta->valor_venta = $request->valor_venta;
        $venta->save();

        return response()->json([
            "status" => 1,
            "msg" => "¡Registro de venta exitoso!",
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function show(venta $venta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function edit(venta $venta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, venta $venta)
    {
        $venta=Venta::findOrFail($request->id);
        $venta->cantidad = $request->cantidad;
        $venta->fecha = $request->fecha;
        $venta->hora = $request->hora;
        $venta->valor_venta = $request->valor_venta;
        $venta->save();

        return response()->json([
            "status" => 1,
            "msg" => "¡Actualizacion de venta exitosa!",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $venta=Venta::destroy($request->id);
        return $venta;
    }
}
