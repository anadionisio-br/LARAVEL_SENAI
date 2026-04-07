<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Cadastro Produtos</title>
</head>
<body style="font-family: Arial, sans-serif;">

    <h1>Cadastro Produtos</h1>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <form action="{{ route('produto.salvar') }}" method="POST">
        @csrf

        <label>Nome:</label>
        <input type="text" name="nome" required value="{{ old('nome') }}">
        <br><br>

        <label>Quantidade:</label>
        <input type="number" name="quantidade" required value="{{ old('quantidade') }}">
        <br><br>

        <label>Preço:</label>
        <input type="number" step="0.01" name="preco" required value="{{ old('preco') }}">
        <br><br>

        <label>Setor:</label>
        <select id="setor" name="setor_id" required>
            <option value="">-- Escolha uma opção --</option>
            @foreach($setores as $setor)
                <option value="{{ $setor->id }}"
                    {{ old('setor') == $setor->id ? 'selected' : '' }}>
                    {{ $setor->nome }} (Corredor {{ $setor->numCorredor }})
                </option>
            @endforeach
        </select>
        <br><br>

        <label>Descrição: </label>
        <input type="text" name="descricao" required value="{{ old('descricao') }}">
        <br><br>

        <label>Tamanho: </label>
        <input type="text" name="tamanho" required value="{{old('tamanho')}}">
        <br><br>

        <label>Peso: </label>
        <input type="text" name="peso" required value="{{old('peso')}}">
        <br><br>

        <input type="submit" value="Cadastrar" style="background-color: blue; color: white;">

    </form>

    @if($errors->any())
        <div style="color:red">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

</body>
</html>