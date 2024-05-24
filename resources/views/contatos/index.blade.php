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
         Telefone: {{$contato->telefoneNumero[0]->numero}}
           Tipo: @if ($contato->telefoneNumero[0]->tipo == 0)
               Fixo
            @else
                Celular
            @endif
        <div style="margin-top: 1rem;">
            <form action="/edit/{{$contato->id}}" method="GET">
                @csrf
                <button type="submit" >Editar</button>
            </form>
            <form action="/destroy/{{$contato->id}}" method="POST">
                @method("DELETE")
                @csrf
                <button type="submit" >Apagar Contato</button>
            </form>
            <form action="/show/{{$contato->id}}" method="GET">
                @csrf
                <button>Visualizar contato</button>
            </form>
        </div>
    </div>


    @endforeach
    <a href="/create">Criar novo contato</a>

</body>
</html>
