<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listaPacientes = Paciente::all();
        return view('pacientes.pacientes', ['listaPacientes'=>$listaPacientes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('pacientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate ([
            'nombre' => 'required',
            'identificacion' => 'required',
            'telefono' => 'required',
            'email' => 'required',
        ]);

        Paciente::create($request->all());
        return redirect()->route('pacientes.index');
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
        $paciente = Paciente::findOrFail($id);
        return view ('pacientes.edit', ['paciente' =>$paciente]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validarDatos= $request->validate([
            'nombre' =>'required',
            'identificacion' =>'required',
            'telefono' =>'required',
            'email' =>'required',
        ]);

        $paciente = Paciente::findOrFail($id);

        $paciente->nombre = $validarDatos['nombre'];
        $paciente->identificacion = $validarDatos['identificacion'];
        $paciente->telefono = $validarDatos['telefono'];
        $paciente->email = $validarDatos['email'];

        $paciente->save();

        return redirect()->route('pacientes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $registro = Paciente::find($id);

        if ($registro) {
            $registro -> delete();
            return redirect()->route('pacientes.index');
        }
        return redirect()->route('pacientes.index');
    }
}
