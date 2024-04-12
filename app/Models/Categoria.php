<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categorias';

    protected $fillable = [
        'nome',
        'descricao'
    ];

    //retorna os produtos da categoria -> usando no dashboardController
    public function produtos(): HasMany
    {
        return $this->hasMany(Produto::class, 'categoria_id');
    }
}
