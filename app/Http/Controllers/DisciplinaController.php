<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disciplina;

class DisciplinaController extends Controller
{
    
    public function index()
    {
        $disciplinas = Disciplina::all();
        return view('disciplinas.index', compact('disciplinas'));
    }

    
    public function create()
    {
        return view('disciplina.create');
    }

    public function store(Request $request)
    {
       // 1. Validação dos dados
       $request->validate([
        'nome' => 'required|string|max:255|unique:disciplinas,nome', // Nome deve ser único
        'carga_horaria' => 'required|integer|min:1',
        'valor_hora' => 'required|numeric|min:0.01',
    ]);

    // 2. Criação do registro
    Disciplina::create($request->all());

    // 3. Redireciona com mensagem de sucesso
    return redirect()->route('disciplinas.index')
                     ->with('success', 'Disciplina cadastrada com sucesso!');
    }

    
    public function show(string $id)
    {
        $disciplina = Disciplina::findOrFail($id);
        return view('disciplina.show', compact('disciplina'));
    }

    
    public function edit(string $id)
    {
        $disciplina = Disciplina::findOrFail($id);
        return view('disciplina.edit', compact('disciplina'));
    }

    
    public function update(Request $request, string $id)
    {
        $disciplina = Disciplina::findOrFail($id);
        
        // 1. Validação (o nome deve ser único, exceto para o registro atual)
        $request->validate([
            'nome' => 'required|string|max:255|unique:disciplinas,nome,'.$disciplina->id,
            'carga_horaria' => 'required|integer|min:1',
            'valor_hora' => 'required|numeric|min:0.01',
        ]);
        
        // 2. Atualização dos dados
        $disciplina->update($request->all());

        // 3. Redireciona com mensagem de sucesso
        return redirect()->route('disciplinas.index')
                         ->with('success', 'Disciplina atualizada com sucesso!');
    }

    
    public function destroy(string $id)
    {
        Disciplina::destroy($id);
        return redirect()->route('disciplinas.index')
                         ->with('success', 'Disciplina excluída com sucesso.');
    }
}
