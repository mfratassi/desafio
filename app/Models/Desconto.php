<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desconto extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }

    // public function campanhaProduto()
    // {
    //     return $this->belongsTo(CampanhaProduto::class);
    // }

    public function descontoproduto()
    {
        return $this->belongsTo(DescontoProduto::class, 'desconto_produto_id', 'id');
    }
}

