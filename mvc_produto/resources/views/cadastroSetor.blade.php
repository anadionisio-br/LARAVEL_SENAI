<!DOCTYPE html>
<html lang="{{str_replace('_','-',app()->getLocale())}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Setor</title>
</head>
<body>

    <h1>Cadastro Setor</h1>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <form action="{{route('setor.salvar')}}" method="POST">
        @csrf

        <label for="nome">Nome do Setor:</label>
        <input type="text" name="nome" id="nome" required value="{{old('nome')}}">
        <br><br>

        <label for="numCorredor">N° do Corredor:</label>
        <input type="number" name="numCorredor" id="numCorredor" required value="{{old('numCorredor')}}">
        <br><br>

        <input type="submit" value="Cadastrar">
    </form>

    @if($errors->any())
        <div style="color:red">
            <ul>
                @foreach ($errors->all() as $erroor)
                    <li>{{ $erroor }}</li>
                @endforeach
            </ul>
        </div>
    @endif

</body>
</html>