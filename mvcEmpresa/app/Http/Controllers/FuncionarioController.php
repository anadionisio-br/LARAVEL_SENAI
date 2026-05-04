<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Models\Departamento;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    public function listar(){
        $funcionarios = Funcionario::with('departamento')->get();
        return view('listar', compact('funcionarios'));
    }

    public function cadastro(){
        $departamentos = Departamento::all();
        return view('cadastroFuncionario', compact('departamentos'));
    }

    public function add(Request $request){
        $request->validate([
            'nome' => 'required|string|max:255',
            'sobrenome' => 'nullable|string|max:255',
            'email' => 'required|string|max:255|unique:funcionarios,email',
            'cargo' => 'required|string|max:255',
            'dataAdmissao' => 'required|date',
            'salario' => 'nullable',
            'departamento_id' => 'nullable|exists:departamentos,id'
        ]);

        Funcionario::create($request->all());

        return redirect()->back()->with('success','Funcionário cadastrado com sucesso!');
    }

    public function atualizar($id){
        $funcionario = Funcionario::findOrFail($id);
        $departamentos = Departamento::all();

        return view('atualizarFuncionario', compact('funcionario', 'departamentos'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nome' => 'required|string|max:255',
            'sobrenome' => 'nullable|string|max:255',
            'email' => "required|string|max:255|unique:funcionarios,email,$id",
            'cargo' => 'required|string|max:255',
            'dataAdmissao' => 'required|date',
            'salario' => 'nullable',
            'departamento_id' => 'nullable|exists:departamentos,id'
        ]);

        $funcionario = Funcionario::findOrFail($id);

        $funcionario->update($request->all());

        return redirect()->route('funcionario.listar')
            ->with('success','Funcionário atualizado com sucesso!');
    }
}