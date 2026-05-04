<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Departamento</title>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f5f6fa;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 500px;
            margin: 60px auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        a {
            display: inline-block;
            margin: 5px 0;
            text-decoration: none;
            color: #4a69bd;
            font-size: 14px;
        }

        a:hover {
            text-decoration: underline;
        }

        label {
            font-weight: bold;
            font-size: 14px;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border-radius: 8px;
            border: 1px solid #ccc;
            outline: none;
            transition: 0.2s;
        }

        input:focus, select:focus {
            border-color: #4a69bd;
            box-shadow: 0 0 5px rgba(74,105,189,0.3);
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #4a69bd;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background-color: #3b55a0;
        }

        .success {
            background: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 15px;
        }

        .error {
            background: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 6px;
            margin-top: 15px;
        }

        ul {
            padding-left: 20px;
            margin: 0;
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
    </style>
</head>
<body>

<div class="container">

    <h1>Cadastro de Departamento</h1>

    <div class="links">
        <a href="{{route('funcionario.cadastro')}}">Cadastrar Funcionário</a>
        <a href="{{route('funcionario.listar')}}">Listar Funcionários</a>
    </div>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('departamento.salvar') }}" method="POST">
        @csrf

        <label>Nome:</label>
        <input type="text" name="nome" required value="{{ old('nome') }}">

        <label>Data de Criação:</label>
        <input type="date" name="dataCriacao" required value="{{ old('dataCriacao') }}">

        <label>Orçamento:</label>
        <input type="number" name="orcamento" required value="{{ old('orcamento') }}">

        <label>Sigla:</label>
        <select name="sigla">
            <option value="">--Selecione uma Opção--</option>
            <option value="rh">RH - Recursos Humanos</option>
            <option value="ti">TI - Tecnologia da Informação</option>
        </select>

        <button type="submit">Cadastrar</button>
    </form>

    @if($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

</div>

</body>
</html>