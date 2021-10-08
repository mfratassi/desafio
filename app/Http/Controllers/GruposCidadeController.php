<?php

namespace App\Http\Controllers;

use App\Models\Campanha;
use App\Models\Cidade;
use App\Models\GruposCidade;
use Illuminate\Http\Request;


class GruposCidadeController extends Controller
{
    /**
     * Adiciona uma campanha a um grupo se ele existir e se não tiver
     * 
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function add_campanha($g_id, $c_id)
    {
        $g = GruposCidade::findOrFail($g_id);
        $c = Campanha::findOrFail($c_id);

        if ($c->grupo_id){
            $c->update([
                'grupo_id' => null
            ]);
        }

        $c->update([
            'grupo_id' => $g_id
        ]);

        redirect()->route('campanhas.show', $c_id);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grupos = GruposCidade::with([
            'cidades.estado', 
            'campanha.descontoproduto', 
            'campanha.descontoproduto.produto', 
            'campanha.descontoproduto.desconto'
        ])->get();

        return $grupos;
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
        GruposCidade::create($data);
        return redirect()->route('grupos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $grupo = GruposCidade::with([
            'cidades.estado', 
            'campanha.descontoproduto', 
            'campanha.descontoproduto.produto', 
            'campanha.descontoproduto.desconto'
        ])->findOrFail($id);

       return $grupo;
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
        
        $grupo = GruposCidade::find($id);
        $grupo->update($data);        

        return redirect()->route('grupos.show', $grupo->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($grupo = GruposCidade::find($id))
            $grupo->delete();

        return redirect()->route('grupos.index');
    }
}
