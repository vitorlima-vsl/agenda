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
    <h1 class="text-3xl">Detalhes do Contato</h1>

    <p><strong>Nome:</strong> {{ $contato->nome }}</p>

    <p><strong>Telefone:</strong></p>
    @foreach ($contato->telefoneNumero as $telefone)
        <p>{{ $telefone->numero }} {{$tipoTelefones[$telefone->tipo]}}</p>
    @endforeach

    <p><strong>Endereço:</strong></p>
    <p>Cidade: {{ $contato->endereco->cidade }}</p>
    <p>Rua: {{ $contato->endereco->rua }}</p>
    <p>Número: {{ $contato->endereco->numero }}</p>



    <p><strong>Categorias:</strong></p>
    @foreach ($categorias as $key => $categoria)
        @if ($contato->categoria->contains($key))
            <p>{{ $categoria }}</p>
        @endif
    @endforeach
    <div style="margin-top: 1rem;">
        <form action="/edit/{{$contato->id}}" method="GET">
            @csrf
            <button type="submit" >Editar</button>
        </form>
        <button type="button" onclick="window.location.href='/index'">Voltar</button>
    </body>
    </div>

</html>
