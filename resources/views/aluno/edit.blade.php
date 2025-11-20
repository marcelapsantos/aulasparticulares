<!DOCTYPE html>
<html>
<head>
    <title>Editar Aluno</title>
</head>
<body>
    <h1>✏️ Editar Aluno: {{ $aluno->nome }}</h1>
    <a href="{{ route('alunos.index') }}">← Voltar</a>
    <hr>
    
    <form method="POST" action="{{ route('alunos.update', $aluno) }}">
        @csrf 
        @method('PUT') 

        <div>
            <label for="nome">Nome:</label>
            {{-- old() pega o valor se a validação falhar, caso contrário usa o valor atual do banco --}}
            <input type="text" name="nome" id="nome" value="{{ old('nome', $aluno->nome) }}" required>
        </div>
        <br>
        <div>
            <label for="telefone">Telefone:</label>
            <input type="text" name="telefone" id="telefone" value="{{ old('telefone', $aluno->telefone) }}">
        </div>
        <br>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{ old('email', $aluno->email) }}" required>
        </div>
        <br>
        
        <button type="submit">Atualizar Aluno</button>
    </form>
</body>
</html>