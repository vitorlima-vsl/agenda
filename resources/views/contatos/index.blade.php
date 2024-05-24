<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>

<body>


    <div class="bg-clip-border border-2 border-black border-rounder border-dashed p-4 shadow bg-white sm:w-2/4 xl:w-1/4 sm:">
        <h1 class="text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl">AGENDA</h1>

        @foreach ($contatos as $contato)
            <div class="grid grid-cols-2 p-2 rounded shadow w-full " id="mainDiv">
                <div class="">
                    Contato: {{ $contato->nome }}
                    <div class="">
                        {{ $contato->telefoneNumero[0]->numero }}

                        : @if ($contato->telefoneNumero[0]->tipo == 0)
                            Fixo
                        @else
                            Celular
                        @endif
                    </div>
                </div>



                <div class="flex content-start justify-end">

                    <button onclick="toggleMenu(this)"
                        class="group cursor-pointer outline-none hover:rotate-90 duration-300 h-6 w-6 mt-1  absolute"
                        title="Add New">
                        <svg class="stroke-teal-500 fill-none group-hover:fill-teal-800 group-active:stroke-teal-200 group-active:fill-teal-600 group-active:duration-0 duration-300"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-width="1.5"
                                d="M12 22C17.5 22 22 17.5 22 12C22 6.5 17.5 2 12 2C6.5 2 2 6.5 2 12C2 17.5 6.5 22 12 22Z">
                            </path>
                            <path stroke-width="1.5" d="M8 12H16"></path>
                            <path stroke-width="1.5" d="M12 16V8"></path>
                        </svg>
                    </button>
                </div>
                <div class="menuOptions mt-2" style="display: none;">
                    <form action="/edit/{{ $contato->id }}" method="GET">
                        @csrf
                        <button type="submit" class="bg-sky-500 hover:bg-sky-700 rounded-full ms-2 p-1">
                            <p class="text-xs">Editar</p>
                        </button>
                    </form>
                    <form action="/destroy/{{ $contato->id }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="bg-sky-500 hover:bg-sky-700 rounded-full ms-2 p-1">
                            <p class="text-xs">Apagar</p>
                        </button>
                    </form>
                    <form action="/show/{{ $contato->id }}" method="GET">
                        @csrf
                        <button type="submit" class="bg-sky-500 hover:bg-sky-700 rounded-full ms-2 p-1">
                            <p class="text-xs">Visualizar</p>
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
        <a href="/create" class="bg-sky-500 hover:bg-sky-700 rounded ms-2">Criar novo contato</a>
    </div>

</body>
<script src="{{ asset('app.js') }}"></script>

</html>
