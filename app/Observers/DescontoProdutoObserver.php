<?php

namespace App\Observers;

use App\Models\Desconto;
use App\Models\DescontoProduto;
use App\Models\Produto;

class DescontoProdutoObserver
{
    /**
     * Aplica valor com desconto sobre um produto em uma campanha
     *
     * @param DescontoProduto $dp
     * @return void
     */
    public function creating(DescontoProduto $dp)
    {
        $dsc = Desconto::where('desconto_produto_id', $dp->id)->first(); 
        $dsc = $dsc ? $dsc->valor : 0.0;

        $vl = Produto::find($dp->produto_id)->valor;
        
        $valor = (1 - $dsc)  * $vl;
        $dp->valor = $valor;
    }

    /**
     * Computa subtotal de um produto em uma campanha
     *
     * @param DescontoProduto $dp
     * @return void
     */
    public function updating(DescontoProduto $dp)
    {
        $dp->valorTotal = $dp->quantidade * $dp->valor;
    }

}
