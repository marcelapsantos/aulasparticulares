<!DOCTYPE html>
<html>
<head>
    <title>Lista de Alunos</title>
</head>
<body>
    <h1>👥 Alunos Cadastrados</h1>
    <p><a href="{{ route('alunos.create') }}">Cadastrar Novo Aluno</a></p>

    @if($alunos->count())
        <table border="1" cellpadding="8">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
            @foreach($alunos as $aluno)
            <tr>
                <td>{{ $aluno->id }}</td>
                <td>{{ $aluno->nome }}</td>
                <td>{{ $aluno->telefone }}</td>
                <td>{{ $aluno->email }}</td>
                <td>
                    <a href="{{ route('alunos.edit', $aluno) }}">Editar</a> |
                    <form action="{{ route('alunos.destroy', $aluno) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Tem certeza?')">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    @else
        <p>Nenhum aluno cadastrado.</p>
    @endif
</body>
</html>
