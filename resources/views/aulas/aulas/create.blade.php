<!DOCTYPE html>
<html>
<head>
    <title>Criar Nova Aula</title>
</head>
<body>
    <h1>➕ Criar Nova Aula</h1>
    <a href="{{ route('aulas.index') }}">← Voltar</a>
    <hr>
    
    <form method="POST" action="{{ route('aulas.store') }}">
        @csrf 

        <div>
            <label for="aluno_id">Aluno:</label>
            <select name="aluno_id" id="aluno_id" required>
                <option value="">Selecione o Aluno</option>
                {{-- $alunos é passado do AulaController@create --}}
                @foreach($alunos as $aluno)
                    <option value="{{ $aluno->id }}">{{ $aluno->nome }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div>
            <label for="disciplina_id">Disciplina:</label>
            <select name="disciplina_id" id="disciplina_id" required>
                <option value="">Selecione a Disciplina</option>
                {{-- $disciplinas é passado do AulaController@create --}}
                @foreach($disciplinas as $disciplina)
                    <option value="{{ $disciplina->id }}">{{ $disciplina->nome }}</option>
                @endforeach
            </select>
        </div>
        <br>
        {{-- Adicionar outros campos específicos de Aula (ex: data, observacao) --}}
        <div>
            <label for="data">Data da Aula:</label>
            <input type="date" name="data" id="data" required>
        </div>
        <br>
        
        <button type="submit">Salvar Aula</button>
    </form>
</body>
</html>