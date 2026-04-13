<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro - Editora</title>
</head>
<body>
    <style>

        form{
            font-family: Arial, Helvetica, sans-serif;
        }

        a{
            color: black;
            padding: 30px;
        }

        input,button{
            border-radius: 30px;
            background-color: rgb(210, 228, 255);
            color: white;
        }
        
    </style>
    <header>
        <h1>Cadastro Editora</h1>

        <nav>
            <a href="/editora/listar">Listar Editora</a>
        </nav>
    </header>
    <br><br>

    <main>
        <form action="{{ route('editora.salvar') }}" method="POST">
            @csrf

            <label for="nome">Nome:</label>
            <input type="text" name="nomeEditora" id="nomeEditora" placeholder="Nome da Editora..." require value="{{old('nomeEditora')}}">
            <br><br>

            <label for="cnpj">CNPJ:</label>
            <input type="number" name="cnpj" id="cnpj" placeholder="CNPJ..." require value="{{old('cnpj')}}">
            <br><br>

            <label for="pais">País:</label>
            <input type="text" name="pais" id="pais" placeholder="País da Editora..." require value="{{old('pais')}}">
            <br><br>

            <label for="cidade">Cidade:</label>
            <input type="text" name="cidade" id="cidade" placeholder="Cidade da Editora..." require value="{{old('cidade')}}">
            <br><br>

            <button style="background-color: blue" type="submit">Cadastrar</button>
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

    </main>
    
</body>
</html>