<!DOCTYPE html>
<html>
<head>
    <title>Cadastrar Nova Disciplina</title>
</head>
<body>
    <h1>➕ Cadastrar Nova Disciplina</h1>
    <a href="{{ route('disciplinas.index') }}">← Voltar</a>
    <hr>
    
    <form method="POST" action="{{ route('disciplinas.store') }}">
        @csrf 

        <div>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="{{ old('nome') }}" required>
        </div>
        <br>
        <div>
            <label for="carga_horaria">Carga Horária (horas):</label>
            <input type="number" name="carga_horaria" id="carga_horaria" value="{{ old('carga_horaria') }}" required>
        </div>
        <br>
        <div>
            <label for="valor_hora">Valor da Hora:</label>
            <input type="number" step="0.01" name="valor_hora" id="valor_hora" value="{{ old('valor_hora') }}" required>
        </div>
        <br>
        
        <button type="submit">Salvar Disciplina</button>
    </form>
</body>
</html>