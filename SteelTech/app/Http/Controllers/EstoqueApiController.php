<?php

namespace App\Http\Controllers;

use App\Models\Estoque;
use Illuminate\Http\Request;

class EstoqueApiController extends Controller
{
    public function listarApi(Request $request)
    {
        try {

            $query = Estoque::query();


            if ($request->filled('nome')) {
                $query->where(
                    'nome',
                    'like',
                    '%' . $request->nome . '%'
                );
            }

            $estoque = $query->get();

            return response()->json([
                'success' => true,
                'data' => $estoque
            ], 200);

        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => 'Erro interno do servidor',
                'errors' => $e->getMessage()
            ], 500);
        }
    }

    public function addApi(Request $request)
    {

        try {

            $request->validate([
                'nome' => 'required|string|max:255',
                'dataFabricacao' => 'required|date',
                'tipoMateria' => 'required|string|max:500',
                'preco' => 'required|string',
                'quantidade' => 'required|numeric'
            ]);


            $estoque = Estoque::create([
                'nome' => $request->nome,
                'dataFabricacao' => $request->dataFabricacao,
                'tipoMateria' => $request->tipoMateria,
                'preco' => $request->preco,
                'quantidade' => $request->quantidade,
                'autor_id' => $request->autor_id
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Estoque Criado',
                'setor' => $estoque
            ], 201);

        } catch (\Illuminate\Validation\ValidationException $e) {

            return response()->json([
                'success' => false,
                'message' => 'Erro de Validação',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => 'Erro interno do Servidor',
                'errors' => $e->getMessage()
            ], 500);
        }
    }

public function updateApi(Request $request, $id)
    {

        try {

            $request->validate([
                'nome' => 'required|string|max:255',
                'dataFabricacao' => 'required|date',
                'tipoMateria' => 'required|string|max:500',
                'preco' => 'required|string',
                'quantidade' => 'required|numeric'
            ]);


            $estoque = Estoque::findOrFail($id);

            $estoque->nome = $request->nome;
            $estoque->dataFabricacao = $request->dataFabricacao;
            $estoque->tipoMateria = $request->tipoMateria;
            $estoque->preco = $request->preco;
            $estoque->quantidade = $request->quantidade;
            

            $estoque->save();

            return response()->json([
                'message' => 'Estoque Atualizado',
                'setor' => $estoque
            ], 200);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {

            return response()->json([
                'success' => false,
                'message' => 'Erro de Validação',
                'errors'=> $e->getMessage()
            ], 422);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {

            return response()->json([
                'success' => false,
                'message' => 'Estoque não encontrado'
            ], 404);

        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => 'Erro interno do Servidor',
                'errors' => $e->getMessage()
            ], 500);
        }
    }


    public function deletarApi($id)
    {

        try {

            $estoque = Estoque::findOrFail($id);


            $estoque->delete();

  
            return response()->json([
                'message' => 'Estoque Deletado com Sucesso',
                'setor' => $estoque
            ], 200);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {

            return response()->json([
                'success' => false,
                'message' => 'Estoque não encontrado'
            ], 404);

        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => 'Erro interno do Servidor',
                'errors' => $e->getMessage()
            ], 500);
        }
    }
}