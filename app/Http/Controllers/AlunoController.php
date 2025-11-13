<?php

namespace App\Http\Controllers;
use App\Models\Aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    
    public function index()
    {
        $alunos = Aluno::all();
        return view('aluno.index', compact('alunos'));
    }

  
    public function create()
    {
        return view('aluno.create');
    }

   
    public function store(Request $request)
    {
         // 1. Validação dos dados de entrada
         $request->validate([
            'nome' => 'required|string|max:255',
            'telefone' => 'nullable|string|max:20',
            'email' => 'required|email|unique:alunos,email', // O e-mail deve ser único
        ]);

        // 2. Criação do registro no banco de dados
        Aluno::create([
            'nome' => $request->nome,
            'telefone' => $request->telefone,
            'email' => $request->email,
        ]);

        // 3. Redireciona com mensagem de sucesso
        return redirect()->route('alunos.index')
                         ->with('success', 'Aluno cadastrado com sucesso!');
    }

    
    public function show(string $id)
    {
        $aluno = Aluno::findOrFail($id);
        return view('aluno.show', compact('aluno'));
    }

    
    public function edit(string $id)
    {
        $aluno = Aluno::findOrFail($id);
        return view('aluno.edit', compact('aluno'));
    }

    
    public function update(Request $request, string $id)
    {
        $aluno = Aluno::findOrFail($id);

        // 1. Validação, ignorando o próprio email do aluno
        $request->validate([
            'nome' => 'required|string|max:255',
            'telefone' => 'nullable|string|max:20',
            'email' => 'required|email|unique:alunos,email,'.$aluno->id, 
        ]);

        // 2. Atualização dos dados
        $aluno->update([
            'nome' => $request->nome,
            'telefone' => $request->telefone,
            'email' => $request->email,
        ]);

        // 3. Redireciona com mensagem de sucesso
        return redirect()->route('alunos.index')
                         ->with('success', 'Dados do Aluno atualizados com sucesso!');
    }

   
    public function destroy(string $id)
    {
        $aluno = Aluno::findOrFail($id);
        
        // Se a FK estiver configurada corretamente na Migration, isso pode excluir as Aulas relacionadas (cascade)
        $aluno->delete(); 
        
        return redirect()->route('alunos.index')
                         ->with('success', 'Aluno excluído com sucesso.');
    }
}
