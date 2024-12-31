<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;
use App\Models\Doctor;
use App\Models\Paciente;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listaCitas = Cita::with(['paciente', 'doctor'])->get();
        return view('citas.citas', compact('listaCitas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $listaDoctores = Doctor::all();
        $listaPacientes = Paciente::all();
        return view('citas.create', compact('listaDoctores', 'listaPacientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request ->validate ([
            'doctor_id' => 'required',
            'paciente_id' => 'required',
            'diagnostico' => 'required',
            'tratamiento' => 'required',
        ]);

        Cita::create($request->all());
        return redirect()->route('citas.index');
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
        $cita = Cita::with(['doctor','paciente'])->findOrFail($id);
        return view('citas.edit', compact('cita'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request -> validate ([
            'diagnostico' => 'required',
            'tratamiento' => 'required',
        ]);

        $cita = Cita::findOrFail($id);
        $cita->update($request->only(['diagnostico','tratamiento']));

        return redirect()->route('citas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $registro = Cita::findOrFail($id);

        if ($registro) {
            $registro->delete();

            return redirect()->route('citas.index');
        }

        return redirect()->route('citas.index');
    }
}
