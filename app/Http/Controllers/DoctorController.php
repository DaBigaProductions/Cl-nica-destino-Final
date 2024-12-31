<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listaDoctores = Doctor::all();
        return view('doctores.doctores', ['listaDoctores' => $listaDoctores]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('doctores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate ([
            'nombre' => 'required',
            'identificacion' => 'required',
            'especialidad' => 'required',
            'telefono' => 'required',
            'correo' => 'required',
        ]);

        Doctor::create($request->all());
        return redirect()->route('doctores.index');

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
        $doctor = Doctor::findOrFail($id);
        return view ('doctores.edit', ['doctor' =>$doctor]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validarDatos= $request->validate([
            'nombre' =>'required',
            'identificacion' =>'required',
            'especialidad' =>'required',
            'telefono' =>'required',
            'correo' =>'required',
        ]);

        $doctor = Doctor::findOrFail($id);

        $doctor->nombre = $validarDatos['nombre'];
        $doctor->identificacion = $validarDatos['identificacion'];
        $doctor->especialidad = $validarDatos['especialidad'];
        $doctor->telefono = $validarDatos['telefono'];
        $doctor->correo = $validarDatos['correo'];

        $doctor->save();

        return redirect()->route('doctores.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $registro = Doctor::find($id);

        if ($registro) {
            $registro -> delete();
            return redirect()->route('doctores.index');
        }

        return redirect()->route('doctores.index');
    }
}
