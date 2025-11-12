<!DOCTYPE html>
<html>
<head>
    <title>Lista de Alunos</title>
</head>
<body>
    <h1>Alunos Cadastrados</h1>

    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Email</th>
        </tr>

        @foreach($alunos as $aluno)
        <tr>
            <td>{{ $aluno->id }}</td>
            <td>{{ $aluno->nome }}</td>
            <td>{{ $aluno->telefone }}</td>
            <td>{{ $aluno->email }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
