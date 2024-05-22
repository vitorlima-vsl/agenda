<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />


</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">


    <form action="/update/{{$contato->id}}" method="POST">
        @csrf
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" value="{{$contato->nome}}">
        <label for="telefoneNumero">Telefone</label>
        @foreach ($contato->telefoneNumero as $telefone)
        <input type="text" name="telefoneNumero[]" id="telefoneNumero"
        value="{{$telefone->numero}}"
        @endforeach>

        <label for="cidade">cidade</label>
        <input type="text" name="cidade" id="cidade" value="{{$contato->endereco->cidade}}">
        <label for="rua">rua</label>
        <input type="text" name="rua" id="rua" value="{{$contato->endereco->rua}}">
        <label for="numero">numero</label>
        <input type="text" name="numero" id="numero" value="{{$contato->endereco->numero}}">

        @foreach ($tipoTelefones as $tipoTelefone)
            <input type="radio" name="tipo[]" value="{{$loop->index}}">{{ $tipoTelefone }}
        @endforeach

        @foreach ($categorias as $key => $categoria)
            <input type="checkbox" name="categorias[]" value="{{ $key }}">{{ $categoria }}
        @endforeach
        <button type="submit">Salvar</button>
        <button type="button" onclick="window.location.href='/index'">Cancelar</button>
    </form>
    <a href="/index">Ver Contatos</a>



</body>

</html>
