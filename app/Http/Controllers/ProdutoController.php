<?php

namespace App\Http\Controllers;


use App\Models\Produto;
use Request;
use Illuminate\Support\Facades\Input;


class ProdutoController extends Controller
{
    public function pesquisar()
    {
        $descricao = Request::input('descricao');

        $produtos = Produto::where('descricao', 'like', '%'.$descricao.'%')->get();

        return view('produto.pesquisar')->with('produtos', $produtos);
    }   //

    public function mostrar_inserir()
    {
        return view('produto.inserir');
    }

    public function inserir()
    {
        $produto = new Produto();

        $produto->descricao = Request::input('descricao');
        $produto->quantidade = Request::input('quantidade');
        $produto->valor = Request::input('valor');
        $produto->data_vencimento = Request::input('data_vencimento');

        $produto->save();

        $mensagem = "Produto inserido com sucesso";

        return view('produto.inserir')->with('mensagem', $mensagem);
    }
    public function mostrar_alterar($id)
    {
        $produto = Produto::find($id);

        return view('produto.alterar')->with('produto', $produto);
    }
    public function alterar()
    {
        $id = Request::input('id');
        $p = Produto::find($id);

        $p->descricao = Request::input('descricao');
        $p->quantidade = Request::input('quantidade');
        $p->valor = Request::input('valor');
        $p->data_vencimento = Request::input('data_vencimento');

        $p->save();

        $mensagem = "Produto alterado com sucesso!";
        $produtos = Produto::all();
        return view('produto.pesquisar')->with('mensagem', $mensagem)->with('produtos', $produtos);
    }
    public function excluir($id)
    {
        $produto = Produto::find($id);

        $produto->delete();

        $mensagem = "Produto excluído com sucesso!";

        $produtos = Produto::all();

        return view('produto.pesquisar')->with('mensagem', $mensagem)->with('produtos', $produtos);
    }
}
