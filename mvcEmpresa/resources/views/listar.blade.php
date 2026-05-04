<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f5f6fa;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1100px;
            margin: 40px auto;
            background: #fff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .links {
            text-align: center;
            margin-bottom: 20px;
        }

        .links a {
            text-decoration: none;
            margin: 5px;
            padding: 8px 12px;
            background-color: #4a69bd;
            color: white;
            border-radius: 6px;
            font-size: 14px;
            transition: 0.3s;
        }

        .links a:hover {
            background-color: #3b55a0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        thead {
            background-color: #4a69bd;
            color: white;
        }

        th, td {
            padding: 10px;
            text-align: center;
        }

        tbody tr {
            border-bottom: 1px solid #eee;
            transition: 0.2s;
        }

        tbody tr:hover {
            background-color: #f1f3f9;
        }

        th {
            font-weight: bold;
        }

        .btn-editar {
            padding: 6px 10px;
            background-color: #38ada9;
            color: white;
            border-radius: 6px;
            text-decoration: none;
            font-size: 13px;
        }

        .btn-editar:hover {
            background-color: #2f8f8b;
        }

        .empty {
            text-align: center;
            padding: 15px;
            color: #777;
        }
    </style>
</head>
<body>

<div class="container">

    <div class="links">
        <a href="{{route('funcionario.cadastro')}}">Cadastrar Funcionários</a>
        <a href="{{route('departamento.cadastro')}}">Cadastrar Departamento</a>
    </div>

    <h1>Relatório de Funcionários</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>Email</th>
                <th>Cargo</th>
                <th>Admissão</th>
                <th>Salário</th>
                <th>Dept. ID</th>
                <th>Departamento</th>
                <th>Criação</th>
                <th>Orçamento</th>
                <th>Sigla</th>
                <th>Ação</th>
            </tr>
        </thead>

        <tbody>
            @forelse($funcionarios as $funcionario)
                <tr>
                    <td>{{ $funcionario->id }}</td>
                    <td>{{ $funcionario->nome }}</td>
                    <td>{{ $funcionario->sobrenome }}</td>
                    <td>{{ $funcionario->email }}</td>
                    <td>{{ $funcionario->cargo }}</td>
                    <td>{{ $funcionario->dataAdmissao }}</td>
                    <td>R$ {{ number_format($funcionario->salario, 2, ',', '.') }}</td>
                    <td>{{ $funcionario->departamento?->id }}</td>
                    <td>{{ $funcionario->departamento?->nome }}</td>
                    <td>{{ $funcionario->departamento?->dataCriacao }}</td>
                    <td>R$ {{ number_format($funcionario->departamento?->orcamento, 2, ',', '.') }}</td>
                    <td>{{ strtoupper($funcionario->departamento?->sigla) }}</td>
                    <td>
                        <a class="btn-editar" href="{{route('funcionario.atualizar', $funcionario->id)}}">
                            Editar
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="13" class="empty">
                        Nenhum funcionário encontrado
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>

</body>
</html>