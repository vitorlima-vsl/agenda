<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    lista de contatos

    @foreach ($contatos as $contato)
    <div>
        Contato: {{$contato->nome}}
        Cidade: {{$contato->endereco->cidade}}
        Rua: {{$contato->endereco->rua}}
        Numero: {{$contato->endereco->numero}}
        
        @foreach ($contato->telefoneNumero as $telefone)
            Telefone: {{$telefone->numero}}
           Tipo: @if ($telefone->tipo == 0)
               Fixo
            @else
                Celular
            @endif
        @endforeach
        Categorias:  @foreach ($contato->categoria as $categoria)
            {{$categoria->nome}}
        @endforeach

        <form action="/edit/{{$contato->id}}" method="GET">
            @csrf
            <button type="submit" >editar</button>
        </form>
        <form action="/destroy/{{$contato->id}}" method="POST">
            @method("DELETE")
            @csrf
            <button type="submit" >excluir</button>
        </form>
        <form action="/show/{{$contato->id}}" method="GET">
            @csrf
            <button>ver contato</button>
        </form>
    </div>


    @endforeach
    <a href="/create">Criar novo contato</a>

</body>
</html>
