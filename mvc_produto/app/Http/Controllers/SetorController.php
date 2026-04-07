<?php

namespace App\Http\Controllers;

use App\Models\Setores;   // Importa o model Produto
use Illuminate\Http\Request;

class SetorController extends Controller
{
    public function listar()
    {
        // Busca todos os produtos junto com seus setores
        $setores = Setores::all();

        // Passa os produtos para a view
        return view('listarSetor', compact('setores'));
    }

        // Salva o produto no banco
    public function add(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'nome' => 'required|string|max:255',
            'numCorredor' => 'required|integer|min:0',
        ]);

        // Cria o produto
        Setores::create([
            'nome' => $request->nome,
            'numCorredor' => $request->numCorredor,
        ]);

        // Redireciona de volta com mensagem de sucesso
        return redirect()->back()->with('success', 'Produto cadastrado com sucesso!');
    }
}