<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Informações</title>
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

        input{
            border-radius: 30px;
            background-color: rgb(210, 228, 255);
            color: white;
        }

    </style>
    <header>
        <h1>Atualizar Livro</h1>
    </header>

    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <main>

        <form action="{{ route('livro.update', $livro->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="nome">Nome:</label>
            <input type="text" name="nomeLivro" value="{{ old('nomeLivro', $livro->nomeLivro) }}" required>
            <br><br>

            <label for="autor">Autor:</label>
            <input type="text" name="autor" value="{{ old('autor', $livro->autor) }}" required>
            <br><br>

            <label for="descricao">Descrição:</label>
            <input type="text" name="descricao" value="{{ old('descricao', $livro->descricao) }}" required>
            <br><br>

            <label for="detalhe">Custo:</label>
            <input type="text" name="custo" value="{{ old('custo', $livro->detalhe?->custo) }}" required>
            <br><br>

            <label for="preco">Preço:</label>
            <input type="text" name="preco_venda" value="{{ old('preco_venda', $livro->detalhe?->preco_venda) }}" required>
            <br><br>

            <label for="importo">Imposto:</label>
            <input type="text" name="imposto" value="{{ old('imposto', $livro->detalhe?->imposto) }}" required>
            <br><br>
            
            <button  style="background-color: blue" type="submit">Atualizar</button>

        </form>

        @if($errors->any())
            <div style="color: red">
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