<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\Cast\Double;

use function PHPUnit\Framework\returnSelf;
use function PHPUnit\Framework\returnValue;

class DescontoProduto extends Model
{
    use HasFactory;
    protected $guarded = ['valor'];

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
