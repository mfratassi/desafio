<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    protected $guarded = []; 

    public function campanhas()
    {
        return $this->belongsToMany(Campanha::class, 'campanha_produtos', 'produto_id', 'campanha_id');
    }

    // public function desconto()
    // {
    //     return $this->hasOne(Desconto::class);
    // }

    public function descontos_produtos()
    {
        return $this->hasMany(DescontoProduto::class);
    }

} 
