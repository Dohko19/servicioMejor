<?php

namespace App\Http\Controllers;

use App\DataAdd;
use App\User;
use Illuminate\Http\Request;

class DatosAdicionalesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.datosAdd.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new DataAdd();
        $data->rfc = $request->rfc;
        $data->cedula_profesional = $request->cedula_profesional;
        $data->certificacion = $request->certificacion;
        $data->permisos_especiales = $request->permisos_especiales;
        $data->otro = $request->otro;
        if ($request->file('business_image')) {
        $data->business_image = $request->file('business_image')->store('public');
        }
        $data->tiempo_completo = $request->tiempo_completo == 'on' ? true : false;
        $data->domicilio = $request->domicilio == 'on' ? true : false;
        $data->atencion_inmediata = $request->atencion_inmediata == 'on' ? true : false;
        $data->servicios_externos = $request->servicios_externos == 'on' ? true : false;
        $data->save();
        if (auth()->check())
        {
            auth()->user()->datosAdd()->save($data);
        }

        return redirect()->route('dashboard.index')->with('info', 'Tu Informacion se a actualizado Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DataAdd::findOrFail($id);
        return view('dashboard.datosAdd.edit', compact('data'));
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
        $data = DataAdd::findOrFail($id);
        $data->rfc = $request->rfc;
        $data->cedula_profesional = $request->cedula_profesional;
        $data->certificacion = $request->certificacion;
        $data->permisos_especiales = $request->permisos_especiales;
        if ($request->file('business_image')) {
        $data->business_image = $request->file('business_image')->store('public');
        }
        $data->otro = $request->otro;
        $data->update();

        return redirect()->back()->with('info', 'Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
