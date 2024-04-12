<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (config('app.env') == 'local') {
            Categoria::factory()->count(5)->create();
            return;
        }


        $categorias = [
            [
                'nome' => 'Eletronicos',
                'descricao' => 'Melhor preço que na shopee'
            ],
            [
                'nome' => 'Eletrodomesticos',
                'descricao' => 'Melhor preço que na shopee'
            ],
            [
                'nome' => 'Presentes',
                'descricao' => 'Melhor preço que na shopee'
            ],
        ];

        foreach ($categorias as $categoria) {
            Categoria::query()->create($categoria);
        }
    }
}
