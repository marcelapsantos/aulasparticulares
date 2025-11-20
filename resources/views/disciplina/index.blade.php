<!DOCTYPE html>
<html>
<head>
    <title>Lista de Disciplinas</title>
</head>
<body>
    <h1>📐 Disciplinas Cadastradas</h1>
    <p><a href="{{ route('disciplinas.create') }}">Cadastrar Nova Disciplina</a></p>

    @if($disciplinas->count())
        <table border="1" cellpadding="8">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Carga Horária (h)</th>
                <th>Valor da Hora (R$)</th>
                <th>Ações</th>
            </tr>
            @foreach($disciplinas as $disciplina)
            <tr>
                <td>{{ $disciplina->id }}</td>
                <td>{{ $disciplina->nome }}</td>
                <td>{{ $disciplina->carga_horaria }}</td>
                <td>R$ {{ number_format($disciplina->valor_hora, 2, ',', '.') }}</td>
                <td>
                    <a href="{{ route('disciplinas.edit', $disciplina) }}">Editar</a> |
                    <form action="{{ route('disciplinas.destroy', $disciplina) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Tem certeza?')">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    @else
        <p>Nenhuma disciplina cadastrada.</p>
    @endif
</body>
</html>