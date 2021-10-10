<?php

namespace App\Http\Controllers;

use App\Models\Desconto;
use Illuminate\Http\Request;

class DescontoProduto extends Controller
{

    public function adicionar_desconto(Request $request, $campanha_id, $produto_id)
    {
        $dp = \App\Models\DescontoProduto::firstWhere([
            'campanha_id' => $campanha_id, 
            'produto_id' => $produto_id
        ]);

        /**
        * Implementar validação de valor de desconto
        */

        if ($dp && $valor = $request->valor){
            if ($desc = Desconto::find($dp->id)){
                $desc->update([
                    'valor' => $valor
                ]);
            }else {
                Desconto::create([
                    'desconto_produto_id' => $dp->id, 
                    'valor' => $valor
                ]);
            }
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
