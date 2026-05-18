<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;

class AutorApiController extends Controller
{
    public function listarApi()
    {
        return response()->json(Autor::all());
    }

    public function addApi(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'data_nascimento' => 'required|date',
            'email' => 'required|string|max:255',
            'telefone' => 'required|string|max:255'
        ]);

        $autor = Autor::create($request->all());

        return response()->json([
            'message' => 'Autor criado',
            'autor' => $autor
        ]);
    }

    public function updateApi(Request $request, $id)
    {
        $autor = Autor::findOrFail($id);

        $autor->update($request->all());

        return response()->json([
            'message' => 'Autor atualizado',
            'autor' => $autor
        ]);
    }

    public function deletarApi($id)
    {
        $autor = Autor::findOrFail($id);

        $autor->delete();

        return response()->json([
            'message' => 'Autor deletado'
        ]);
    }
}