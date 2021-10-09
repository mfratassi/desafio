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
        return $this->belongsTo(GruposCidade::class, 'grupo_id', 'id')->nullable();
    }
    
    public function descontoproduto()
    {
        return $this->hasMany(DescontoProduto::class);
    }
}
