<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Departamento</title>
</head>
<body>
    <h1>Cadastro de Departamento</h1>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <form action="{{ route('funcionario.salvar') }}" method="POST">
        @csrf

        <label>Nome:</label>
        <input type="text" name="nome" required value="{{ old('nome') }}">
        <br><br>

        <label>Data de Criação:</label>
        <input type="date" name="dataCriacao" required value="{{ old('dataCriacao') }}">
        <br><br>

        <label>Orçamento:</label>
        <input type="number" name="orcamento" required value="{{ old('orcamento') }}">
        <br><br>

        <label>Sigla:</label>
        <select name="sigla">
            <option value="">--Selecione uma Opção --</option>
            <option value="rh">RH - Recursos Humanos</option>
            <option value="ti">TI - Tecnologia da Informação</option>
        </select>            
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