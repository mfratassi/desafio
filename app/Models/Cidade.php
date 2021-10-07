<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    use HasFactory;
    protected $guarded = []; 

    public function grupocidade()
    {
        return $this->belongsTo(GruposCidade::class, 'grupo_id', 'id')
                    ->withDefault([
                        'grupo_id' => null, 
                        'estado_id' => null
                    ]);
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class,'estado_id', 'id');
    }
}
