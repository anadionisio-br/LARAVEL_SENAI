<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estoque;

class EstoqueController extends Controller
{
    public function listar(Request $request)
    {
        try {
            $query = Estoque::query();

            if ($request->filled('nome')) {
                $query->where('nome', 'like', '%' . $request->nome . '%');
            }

            $Estoques = $query->get();

            return view('listarEstoques');

        } catch (\Exception $e) {
            return view('listarEstoques', [
                'Estoques' => collect(),
                'erro' => 'Erro interno do servidor'
            ]);
        }
    }

    public function add(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'dataFabricacao' => 'required|date',
            'tipoMateria' => 'required|string|max:500',
            'preco' => 'required|string',
            'quantidade' => 'required|numeric',
            'autor_id' => 'required|exists:autores,id'
        ]);

        Estoque::create([
            'nome' => $request->nome,
            'dataFabricacao' => $request->dataFabricacao,
            'tipoMateria' => $request->tipoMateria,
            'preco' => $request->preco,
            'quantidade' => $request->quantidade,
            'autor_id' => $request->autor_id
        ]);

        return redirect()->back()
            ->with('success', 'Estoque cadastrado com sucesso!');
    }

    public function atualizar($id)
    {
        $estoque = Estoque::findOrFail($id);

        return view('atualizarEstoque');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'dataFabricacao' => 'required|date',
            'tipoMateria' => 'required|string|max:500',
            'preco' => 'required|string',
            'quantidade' => 'required|numeric',
            'autor_id' => 'required|exists:autores,id'
        ]);

        $estoque = Estoque::findOrFail($id);

        $estoque->update([
            'nome' => $request->nome,
            'dataFabricacao' => $request->dataFabricacao,
            'tipoMateria' => $request->tipoMateria,
            'preco' => $request->preco,
            'quantidade' => $request->quantidade,
            'autor_id' => $request->autor_id
        ]);

        return redirect()->route('Estoque.listar')
            ->with('success', 'Estoque atualizado com sucesso!');
    }

    public function deletar($id)
    {
        $estoque = Estoque::findOrFail($id);

        $estoque->delete();

        return redirect()->route('Estoque.listar')
            ->with('success', 'Estoque deletado com sucesso!');
    }
}