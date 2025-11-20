<!DOCTYPE html>
<html>
<head>
    <title>Cadastrar Novo Aluno</title>
</head>
<body>
    <h1>➕ Cadastrar Novo Aluno</h1>
    <a href="{{ route('alunos.index') }}">← Voltar</a>
    <hr>
    
    <form method="POST" action="{{ route('alunos.store') }}">
        @csrf 

        <div>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="{{ old('nome') }}" required>
        </div>
        <br>
        <div>
            <label for="telefone">Telefone:</label>
            <input type="text" name="telefone" id="telefone" value="{{ old('telefone') }}">
        </div>
        <br>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required>
        </div>
        <br>
        
        <button type="submit">Salvar Aluno</button>
    </form>
</body>
</html>