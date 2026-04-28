<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Funcionários</title>
</head>
<body>
    <h1>Cadastro de Funcionários</h1>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <form action="{{ route('funcionario.salvar') }}" method="POST">
        @csrf

        <label>Nome:</label>
        <input type="text" name="nome" required value="{{ old('nome') }}">
        <br><br>

        <label>Sobrenome:</label>
        <input type="text" name="sobrenome" required value="{{ old('sobrenome') }}">
        <br><br>

        <label>Email:</label>
        <input type="email" name="email" required value="{{ old('email') }}">
        <br><br>

        <label>Cargo:</label>
        <input type="text" name="cargo" required value="{{ old('cargo') }}">
        <br><br>

        <label>Data de Admissão:</label>
        <input type="date" name="dataAdimissao" required value="{{ old('dataAdimissao') }}">
        <br><br>

        <label>Salário:</label>
        <input type="number" name="salario" required value="{{ old('salario') }}">
        <br><br>


         <input type="submit" value="Cadastrar">
    </form>

    @if($errors->any())
        <div style="color:red">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

</body>
</html>