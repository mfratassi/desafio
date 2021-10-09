<?php

namespace App\Http\Controllers;

use App\Models\Campanha;
use App\Models\Desconto;
use App\Models\DescontoProduto;
use App\Models\Produto;
use Illuminate\Http\Request;

class CampanhaController extends Controller
{
    
    /**
     * Adiciona um produto a uma campanha
     *
     * @param int $campanha_id
     * @param int $produto_id
     * @return void
     */
    public function add_produto(Request $request, int $campanha_id, int $produto_id)
    {
        $vl = Produto::find($produto_id)->valor;
        $dp = DescontoProduto::where([
            'produto_id' => $produto_id, 
            'campanha_id' => $campanha_id
        ])->first();

        if ($dp){
            $dp->update([
                'quantidade' => $dp->quantidade+1
            ]);
        }else {
            $dp = DescontoProduto::create([
                'campanha_id' => $campanha_id, 
                'produto_id' => $produto_id, 
                'quantidade' => 1,
            ]);
        }

        if ($desc = $request->desconto){

            $dp = DescontoProduto::where([
                'produto_id' => $produto_id, 
                'campanha_id' => $campanha_id
            ])->first();
            
            if ($d = Desconto::find($dp->id)){
                $d->update([
                    'valor' => $desc
                ]);
            }else {
                Desconto::create([
                    'desconto_produto_id' => $dp->id, 
                    'valor' => $desc
                ]);
            }

            $dp->update([
                'quantidade' => $dp->quantidade
            ]);
        }

        return redirect()->route('campanhas.show', $campanha_id);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Campanha::with([
            'descontoproduto',
            'descontoproduto.produto', 
            'descontoproduto.desconto'
        ])->get();
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
        return Campanha::with([
            'descontoproduto',
            'descontoproduto.produto', 
            'descontoproduto.desconto'
        ])->findOrFail($id);
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
