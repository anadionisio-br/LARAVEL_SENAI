<!DOCTYPE html>
<html lang="{{ str_replace('_','-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Funcionário</title>

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

        .links {
            text-align: center;
            margin-bottom: 15px;
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
            background-color: #38ada9;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background-color: #2f8f8b;
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
    </style>
</head>
<body>

<div class="container">

    <h1>Atualizar Funcionário</h1>

    <div class="links">
        <a href="{{route('funcionario.cadastro')}}">Cadastrar Funcionários</a>
        <a href="{{route('departamento.cadastro')}}">Cadastrar Departamento</a>
        <a href="{{route('funcionario.listar')}}">Listar</a>
    </div>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('funcionario.update', $funcionario->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nome:</label>
        <input type="text" name="nome" value="{{ old('nome', $funcionario->nome)}}" required>

        <label>Sobrenome:</label>
        <input type="text" name="sobrenome" value="{{ old('sobrenome', $funcionario->sobrenome)}}" required>

        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email', $funcionario->email)}}" required>

        <label>Cargo:</label>
        <input type="text" name="cargo" value="{{ old('cargo', $funcionario->cargo)}}" required>

        <label>Data de Admissão:</label>
        <input type="date" name="dataAdmissao" value="{{ old('dataAdmissao', $funcionario->dataAdmissao)}}" required>

        <label>Salário:</label>
        <input type="number" name="salario" value="{{ old('salario', $funcionario->salario)}}" required>

        <label for="departamento_id">Departamento:</label>
        <select name="departamento_id" id="departamento_id">
            @foreach ($departamentos as $departamento)
                <option value="{{ $departamento->id }}"
                    {{ $funcionario->departamento_id == $departamento->id ? 'selected' : '' }}>
                    {{ $departamento->nome }}
                </option>
            @endforeach
        </select>

        <button type="submit">Atualizar</button>
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