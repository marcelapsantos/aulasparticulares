<!DOCTYPE html>
<html>
<head>
    <title>Editar Disciplina</title>
</head>
<body>
    <h1>✏️ Editar Disciplina: {{ $disciplina->nome }}</h1>
    <a href="{{ route('disciplinas.index') }}">← Voltar</a>
    <hr>
    
    <form method="POST" action="{{ route('disciplinas.update', $disciplina) }}">
        @csrf 
        @method('PUT') 

        <div>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="{{ old('nome', $disciplina->nome) }}" required>
        </div>
        <br>
        <div>
            <label for="carga_horaria">Carga Horária (horas):</label>
            <input type="number" name="carga_horaria" id="carga_horaria" value="{{ old('carga_horaria', $disciplina->carga_horaria) }}" required>
        </div>
        <br>
        <div>
            <label for="valor_hora">Valor da Hora:</label>
            <input type="number" step="0.01" name="valor_hora" id="valor_hora" value="{{ old('valor_hora', $disciplina->valor_hora) }}" required>
        </div>
        <br>
        
        <button type="submit">Atualizar Disciplina</button>
    </form>
</body>
</html>