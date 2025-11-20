<!DOCTYPE html>
<html>
<head>
    <title>Editar Aula</title>
</head>
<body>
    <h1>✏️ Editar Aula #{{ $aula->id }}</h1>
    <a href="{{ route('aulas.index') }}">← Voltar</a>
    <hr>
    
    {{-- O método HTTP deve ser PUT/PATCH para atualização no Laravel --}}
    <form method="POST" action="{{ route('aulas.update', $aula) }}">
        @csrf 
        @method('PUT') {{-- Diretiva para simular o método PUT --}}

        <div>
            <label for="aluno_id">Aluno:</label>
            <select name="aluno_id" id="aluno_id" required>
                <option value="">Selecione o Aluno</option>
                {{-- Usa selected() para manter o valor atual da $aula --}}
                @foreach($alunos as $aluno)
                    <option value="{{ $aluno->id }}" {{ $aula->aluno_id == $aluno->id ? 'selected' : '' }}>
                        {{ $aluno->nome }}
                    </option>
                @endforeach
            </select>
        </div>
        <br>
        <div>
            <label for="disciplina_id">Disciplina:</label>
            <select name="disciplina_id" id="disciplina_id" required>
                <option value="">Selecione a Disciplina</option>
                @foreach($disciplinas as $disciplina)
                    <option value="{{ $disciplina->id }}" {{ $aula->disciplina_id == $disciplina->id ? 'selected' : '' }}>
                        {{ $disciplina->nome }}
                    </option>
                @endforeach
            </select>
        </div>
        <br>
        <div>
            <label for="data">Data da Aula:</label>
            {{-- Usa o value para pré-preencher com o valor atual --}}
            <input type="date" name="data" id="data" value="{{ old('data', \Carbon\Carbon::parse($aula->data)->format('Y-m-d')) }}" required>
        </div>
        <br>
        
        <button type="submit">Atualizar Aula</button>
    </form>
</body>
</html>