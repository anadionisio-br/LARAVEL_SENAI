<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Setores;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    // Exibe o formulário de cadastro de produtos
    public function create()
    {
        // Busca todos os setores do banco para popular o select
        $setores = Setores::all();

        // Envia para a view
        return view('cadastro', compact('setores'));
    }

    // Salva o produto no banco
    public function add(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'nome' => 'required|string|max:255',
            'quantidade' => 'required|integer|min:0',
            'preco' => 'required|numeric|min:0',
            'setor_id' => 'required|exists:setores,id', // Garante que o setor existe
        ]);

        // Cria o detalheProduto
        detalheProduto::create([
            'descricao' => $request->descricao,
            'tamanho' => $request->tamanho,
            'peso' => $request->peso
        ]);

        // Cria o produto
        Produto::create([
            'nome' => $request->nome,
            'quantidade' => $request->quantidade,
            'preco' => $request->preco,
            'setor_id' => $request->setor_id,
        ]);

        // Redireciona de volta com mensagem de sucesso
        return redirect()->back()->with('success', 'Produto cadastrado com sucesso!');
    }

    // Lista todos os produtos com setor
    public function listar()
    {
        $produtos = Produto::with('setor')->get();

        return view('listar', compact('produtos'));
    }
}