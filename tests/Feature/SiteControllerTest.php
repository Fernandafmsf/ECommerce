<?php
namespace Tests\Feature;

use App\Models\Produto;
use Tests\TestCase;

class SiteControllerTest extends TestCase
{
    public function test_pode_listar_produtos_de_uma_categoria()
    {
        // preparar
        $produto = Produto::factory()->create();

        // atuar
        $resposta = $this->get(route('site-categoria', ['categoria' => $produto->categoria_id]));

        // validar
        $resposta->assertSee([
            $produto->nome,
            $produto->categoria->nome
        ]);
    }
}
