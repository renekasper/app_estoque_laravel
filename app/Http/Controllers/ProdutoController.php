<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;


class ProdutoController extends Controller
{
    public function pesquisar()
    {
        $produtos = Produto::all();
        foreach ($produtos as $produto) {
            echo $produto->descricao . "<br>";
        }
    }   //
}
