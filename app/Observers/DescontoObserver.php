<?php

namespace App\Observers;

use App\Models\Desconto;
use App\Models\DescontoProduto;
use App\Models\Produto;

class DescontoObserver
{
    public function saved(Desconto $desc)
    { 
        $dp = DescontoProduto::find($desc->desconto_produto_id);
        $vl = Produto::find($dp->produto_id)->valor;
        
        $valor = (1 - $desc->valor)  * $vl;
        $dp->valor = $valor;
        $dp->save();
    }
}
