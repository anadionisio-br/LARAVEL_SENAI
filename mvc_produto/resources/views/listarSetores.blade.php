<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body  style="font-family: 'Arial', sans-serif;">
    <h1>Relatorio de Setores</h1>

    <a href="{{route('produto.cadastro')}}">Cadastrar Produto</a>
    <br>
    <a href="{{route('setor.cadastro')}}">Cadastrar Setor</a>
    <br>
    <br>
    <form method="GET" action="{{route('setor.listar')}}">
        <input type="text" name="nome" placeholder="Digite o nome do setor"
        value="{{request('nome')}}">
        
        <button type="submit"> buscar </button>
    </form>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>SETOR</th>
                <th>N° CORREDOR</th>
            </tr>
        </thead>
        <tbody>
            @forelse($setores as $setor)
                <tr>
                    <td>{{$setor->id }}</td>
                    <td>{{$setor->nome }}</td>
                    <td>{{$setor->num_setor }}</td>
            @empty
                <tr>
                    <td conspan="3">Nenhum setor encontrado</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>