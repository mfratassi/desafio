<?php

namespace App\Observers;

use App\Models\DescontoProduto;
use App\Models\Produto;

class ProdutoObserver
{
    public function saved(Produto $p)
    {
        DescontoProduto::where('produto_id', $p->id)->each(function($dp){
            $dp->save();
        });
    }
}
