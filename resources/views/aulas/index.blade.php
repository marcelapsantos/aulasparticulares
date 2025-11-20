<!DOCTYPE html>
<html>
<head>
    <title>Lista de Aulas</title>
</head>
<body>
    <h1>📚 Listagem de Aulas</h1>
    <p><a href="{{ route('aulas.create') }}">Adicionar Nova Aula</a></p>
    
    @if($aulas->count())
        <table border="1" cellpadding="8">
            <tr>
                <th>ID</th>
                <th>Aluno</th>
                <th>Disciplina</th>
                <th>Data da Criação</th>
                <th>Ações</th>
            </tr>
            @foreach($aulas as $aula)
            <tr>
                <td>{{ $aula->id }}</td>
                {{-- Acessando os relacionamentos (Aluno e Disciplina) --}}
                <td>{{ $aula->aluno->nome ?? 'N/D' }}</td>
                <td>{{ $aula->disciplina->nome ?? 'N/D' }}</td>
                <td>{{ $aula->created_at->format('d/m/Y') }}</td>
                <td>
                    <a href="{{ route('aulas.edit', $aula) }}">Editar</a> |
                    {{-- Form para DELETE --}}
                    <form action="{{ route('aulas.destroy', $aula) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Tem certeza?')">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        {{ $aulas->links() }} {{-- Links de Paginação --}}
    @else
        <p>Nenhuma aula cadastrada.</p>
    @endif
</body>
</html>