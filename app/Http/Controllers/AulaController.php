<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aula;
use App\Models\Disciplina;

class AulaController extends Controller
{
   
    public function index()
    {
        $aulas = Aula::with(['aluno', 'disciplina'])->latest()->paginate(10);
        return view('aulas.index', compact('aulas'));
    }

   
    public function create()
    {
        $alunos = Aluno::orderBy('nome')->get();
        $disciplinas = Disciplina::orderBy('nome')->get();

        return view('aulas.create', compact('alunos', 'disciplinas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'aluno_id' => 'required|exists:alunos,id',
            'disciplina_id' => 'required|exists:disciplinas,id',
            'data' => 'required|date',
            'duracao_horas' => 'required|numeric|min:0.5',
        ]);
        
        // Busca o valor/hora da disciplina
        $disciplina = Disciplina::findOrFail($request->disciplina_id);
        
        // CALCULA O VALOR TOTAL
        $valorTotal = $request->duracao_horas * $disciplina->valor_hora;
        
        Aula::create([
            'aluno_id' => $request->aluno_id,
            'disciplina_id' => $request->disciplina_id,
            'data' => $request->data,
            'duracao_horas' => $request->duracao_horas,
            'valor_total' => $valorTotal,
        ]);
        
        return redirect()->route('aulas.index')->with('success', 'Aula registrada e valor calculado!');  
    }

    
    public function show(string $id)
    {
        $aula = Aula::with(['aluno', 'disciplina'])->findOrFail($id);
        return view('aulas.show', compact('aula'));
    }

    
    public function edit(string $id)
    {
        $aula = Aula::findOrFail($id);
        $alunos = Aluno::orderBy('nome')->get();
        $disciplinas = Disciplina::orderBy('nome')->get();
        
        return view('aulas.edit', compact('aula', 'alunos', 'disciplinas'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'aluno_id' => 'required|exists:alunos,id',
            'disciplina_id' => 'required|exists:disciplinas,id',
            'data' => 'required|date',
            'duracao_horas' => 'required|numeric|min:0.5',
        ]);
        
        $aula = Aula::findOrFail($id);
        
        // Busca o novo valor/hora da disciplina (caso tenha sido alterada)
        $disciplina = Disciplina::findOrFail($request->disciplina_id);
        
        // RECALCULA O VALOR TOTAL
        $valorTotal = $request->duracao_horas * $disciplina->valor_hora;
        
        $aula->update([
            'aluno_id' => $request->aluno_id,
            'disciplina_id' => $request->disciplina_id,
            'data' => $request->data,
            'duracao_horas' => $request->duracao_horas,
            'valor_total' => $valorTotal, // Salva o valor recalculado
        ]);
        
        return redirect()->route('aulas.index')->with('success', 'Aula atualizada e valor recalculado!');
    }

    
    public function destroy(string $id)
    {
        Aula::destroy($id);
        return redirect()->route('aulas.index')->with('success', 'Aula excluída com sucesso.');
    }
}
