<?php

namespace App\Http\Controllers;

use App\Models\Campanha;
use Illuminate\Http\Request;

class CampanhaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $c = Campanha::with([
            'descontoproduto',
            'descontoproduto.produto', 
            'descontoproduto.desconto'
        ])->get();

        return $c;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($c = Campanha::create($request->all()))
            return redirect()->route('campanhas.show', $c->id);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $c = Campanha::with([
            'descontoproduto',
            'descontoproduto.produto', 
            'descontoproduto.desconto'
        ])->find($id);

        return $c;
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
        $c = Campanha::findOrFail($id); 

        $c->update($request->all());
        
        return redirect()->route('campanhas.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $c = Campanha::findOrFail($id); 

        if ($c->delete())
            return redirect()->route('campanhas.index');
    }
}
