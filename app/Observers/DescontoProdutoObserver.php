<?php

namespace App\Observers;

use App\Models\Desconto;
use App\Models\DescontoProduto;
use App\Models\Produto;

class DescontoProdutoObserver
{
    public function saving(DescontoProduto $dp)
    {
        $dsc = Desconto::where('desconto_produto_id', $dp->id)->first(); 
        $dsc = $dsc ? $dsc->valor : 0.0;

        $vl = Produto::find($dp->produto_id)->valor;
        
        $valor = (1 - $dsc)  * $vl;
        $dp->valor = $valor;
        $dp->subTotal = $dp->quantidade * $dp->produto()->first()->valor;
        $dp->subTotalComDesconto = $dp->quantidade * $dp->valor;
    }

}
