<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasEvents;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DescontoProduto extends Model
{
    use HasFactory;
    use HasEvents;
    protected $guarded = [];

    public function campanha()
    {
        return $this->belongsTo(Campanha::class);
    }

    public function desconto()
    {
        return $this->hasOne(Desconto::class, 'desconto_produto_id', 'id');
    }

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}
