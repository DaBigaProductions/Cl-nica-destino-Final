<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consultorio;

class ConsultorioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listaCon = Consultorio::all();
        return view('consultorios.consultorios', ['listaCon' => $listaCon]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('consultorios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate ([
            'numero' => 'required',
            'piso' => 'required',
        ]);

        Consultorio::create($request->all());
        return redirect()->route('consultorios.index');
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
        $consultorio = Consultorio::findOrFail($id);
        return view ('consultorios.edit', ['consultorio' => $consultorio]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validadDatos = $request->validate([
            'numero' => 'required',
            'piso' => 'required',
        ]);

        $consultorio = Consultorio::findOrFail($id);

        $consultorio->numero = $validadDatos['numero'];
        $consultorio->piso = $validadDatos['piso'];

        $consultorio->save();

        return redirect()->route('consultorios.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $registro = Consultorio::find($id);

        if ($registro) {
            $registro -> delete();

            return redirect()->route('consultorios.index');
        }

        return redirect()->route('consultorios.index');
    }
}
