<?php

namespace Database\Factories;

use App\Models\Categoria;
use App\Models\Produto;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProdutoFactory extends Factory
{

    protected $model = Produto::class;

    public function definition()
    {
        $productName = $this->faker->sentence(3);


        return [
            'nome' => $productName,
            'descricao' => $this->faker->sentence(25),
            'preco' => rand(1000, 2000),
            'imagem' => 'https://place-hold.it/300x300',
            'slug' => str($productName)->slug(),
            'categoria_id' => Categoria::factory(),
            'user_id' => User::factory(),
        ];
    }
}
