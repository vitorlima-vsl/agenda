<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body >


    <div class="bg-clip-border border-2 border-black border-rounder border-dashed p-4 shadow bg-white sm:w-2/4 xl:w-1/4 sm:">
        <h1 class="text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl">AGENDA</h1>

        @foreach ($contatos as $contato)

            <div class="px-4 rounded shadow w-full " id="mainDiv">
                <div class="">
                    Contato: {{$contato->nome}}
                    <button onclick="toggleMenu(this)" class="bg-sky-500 hover:bg-sky-700 rounded ms-2 p-2">☰</button>
                    <div>
                        Telefone: {{$contato->telefoneNumero[0]->numero}}
                        : @if ($contato->telefoneNumero[0]->tipo == 0)
                            Fixo
                        @else
                            Celular
                        @endif
                    </div>
                </div>
                <div class="menuOptions mt-2" style="display: none;">
                    <form action="/edit/{{$contato->id}}" method="GET">
                        @csrf
                        <button type="submit" class="bg-sky-500 hover:bg-sky-700 rounded ms-2 px-2">Editar</button>
                    </form>
                    <form action="/destroy/{{$contato->id}}" method="POST">
                        @method("DELETE")
                        @csrf
                        <button type="submit" class="bg-sky-500 hover:bg-sky-700 rounded ms-2 px-2" >Apagar</button>
                    </form>
                    <form action="/show/{{$contato->id}}" method="GET">
                        @csrf
                        <button type="submit" class="bg-sky-500 hover:bg-sky-700 rounded ms-2 px-2">Visualizar</button>
                    </form>
                </div>
            </div>
        @endforeach
        <a href="/create" class="bg-sky-500 hover:bg-sky-700 rounded ms-2">Criar novo contato</a>
    </div>

</body>
<script src="{{ asset('app.js') }}"></script>
</html>
