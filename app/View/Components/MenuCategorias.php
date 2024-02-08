<?php

namespace App\View\Components;

use App\Models\Categoria;
use Illuminate\View\Component;

class MenuCategorias extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $categoriasMenu = Categoria::all();
        return view('components.menu-categorias', [
            'categoriasMenu' => $categoriasMenu
        ]);
    }
}
