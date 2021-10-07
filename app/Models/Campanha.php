<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campanha extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function gruposcidade()
    {
        return $this->belongsTo(GruposCidade::class, 'grupo_id', 'id');
    }

    // public function produtos()
    // {
    //     return $this->belongsToMany(Produto::class, 'campanha_produtos', 'campanha_id', 'produto_id')
    //         ->as('campanha_produtos')
    //         ->withPivot('id', 'valorComDesconto');
    // }

    public function descontoproduto()
    {
        return $this->hasMany(DescontoProduto::class);
    }
}
