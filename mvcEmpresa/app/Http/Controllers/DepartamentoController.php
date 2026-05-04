<?php
namespace App\Http\Controllers;
use App\Models\Departamento;

use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    public function add(Request $request){

        $request->validate([
            'nome' => 'required|string|max:255|unique:departamentos,nome',
            'dataCriacao' => 'required|date',
            'orcamento' => 'required|numeric',
            'sigla' => 'required|string|max:255'
        ]);
        
        Departamento::create([
            'nome' => $request->nome,
            'dataCriacao' => $request->dataCriacao,
            'orcamento' => $request->orcamento,
            'sigla' => $request->sigla

        ]);

        return redirect()->back()->with('success','Departamento Cadastrado com sucesso!');

    }
}