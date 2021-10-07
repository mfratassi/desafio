<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GruposCidade extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'cidades' => 'array',
    ];

    public function cidades()
    {
        return $this->hasMany(Cidade::class, 'grupo_id', 'id');
    }

    public function campanha()
    {
        return $this->hasOne(Campanha::class, 'grupo_id', 'id');
    }
}


