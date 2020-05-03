<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Http\Request;
use App\Ingreso_vehiculo;
use DB;

class Ingreso_vehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingreso = Ingreso_vehiculo::all();
        return view('IngresoV.index')->with('ingreso', $ingreso);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehiculo = DB::table('vehiculos')
            ->select('vehiculos.placa', 'vehiculos.id')
            ->get();
        return view('ingresoV.create')->with('vehiculo', $vehiculo);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ingreso = new Ingreso_vehiculo;
        $ingreso->vehiculo_id = $request->get('vehiculo_id');
        $ingreso->fecha_ingreso = $request->get('fecha_ingreso');
        $ingreso->estado = $request->get('estado');
        $ingreso->users_id = $request->get('users_id');
        $ingreso->vehiculo_id = $request->get('vehiculo_id');
        $ingreso->save();
        return Redirect::to('ingresoV');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ingreso = Ingreso_vehiculo::find($id);
        return view('ingresoV.show', compact('ingreso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ingreso = ingreso_vehiculo::find($id);
        return view('IngresoV.edit', compact('ingreso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, ['vehiculo_id' => 'required', 'fecha_ingreso' => 'required', 'estado' => 'required']);
        ingreso_vehiculo::find($id)->update($request->all());
        return redirect()->route('ingresoV.index')->with('success', 'Registro actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ingreso_vehiculo::find($id)->delete();
        return redirect()->route('ingresoV.index')->with('success', 'Registro Eliminado');
    }
}
