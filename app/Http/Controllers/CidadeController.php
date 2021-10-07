<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use App\Models\GruposCidade;
use Illuminate\Http\Request;

class CidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cidades = Cidade::with([
            'grupocidade', 
            'estado'
        ])->get();
        
        return $cidades;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except("_token");
        $cidade = Cidade::create($data);

        return redirect()->route('cidades.show', $cidade->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  Cidade $cidade
     * @return \Illuminate\Http\Response
     */
    public function show(int $id, Request $request)
    {
        $cidade = Cidade::with([
            'grupocidade', 
            'estado'
        ])->findOrFail($id);

        return $cidade;
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
        $data = $request->except([
            '_token', 
            '_method'
        ]);

        $cidade = Cidade::findOrFail($id);
        $cidade->update($data);

        return redirect()->route('cidades.show', $cidade->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id, Request $request)
    {
        $data = $request->except([
            '_token', 
            '_method'
        ]);

        $cidades = Cidade::findOrFail($id);

        $cidades->delete(); 

        return redirect(route('cidades.index'));
    }
}
