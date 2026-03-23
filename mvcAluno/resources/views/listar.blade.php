<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Relatorio de Alunos</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>EMAIL</th>
                <th>ATUALIZAR</th>
                <th>DELETAR</th>
            </tr>
        </thead>
        <tbody>
            @forelse($alunos as $aluno)
                <tr>
                    <td>{{$aluno->id }}</td>
                    <td>{{$aluno->nome }}</td>
                    <td>{{$aluno->email }}</td>
                    <td>
                        <a href="{{route('aluno.atualizar', $aluno->id)}}">Atualizar</a>
                    </td>
                    <td>faremos na proxima aula</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" >Nenhum aluno encontrado</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>