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


    <div
        class="bg-clip-border border-2 border-black border-rounder border-dashed p-4 shadow bg-white sm:w-2/4 xl:w-1/4 sm:">
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
                        <svg class="stroke-sky-500 fill-none group-hover:fill-sky-800 group-active:stroke-sky-200 group-active:fill-sky-600 group-active:duration-0 duration-300"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-width="1.5"
                                d="M12 22C17.5 22 22 17.5 22 12C22 6.5 17.5 2 12 2C6.5 2 2 6.5 2 12C2 17.5 6.5 22 12 22Z">
                            </path>
                            <path stroke-width="1.5" d="M8 12H16"></path>
                            <path stroke-width="1.5" d="M12 16V8"></path>
                        </svg>
                    </button>
                </div>
                <div class="menuOptions mt-2" style="display: none; ">
                    <form action="/edit/{{ $contato->id }}" method="GET">
                        @csrf
                        <button type="submit" class="bg-sky-500 hover:bg-sky-700 rounded-full ms-2 p-1">
                            <p class="text-xs">Editar</p>
                        </button>
                    </form>
                    <form action="/show/{{ $contato->id }}" method="GET">
                        @csrf
                        <button type="submit" class="bg-sky-500 hover:bg-sky-700 rounded-full ms-2 p-1">
                            <p class="text-xs">Visualizar</p>
                        </button>
                    </form>
                    <form action="/destroy/{{ $contato->id }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit"
                            class="flex justify-center items-center gap-2 ms-2 w-12 h-6 cursor-pointer rounded-md shadow-2xl text-white font-semibold bg-gradient-to-r from-[#fb7185] via-[#e11d48] to-[#be123c] hover:shadow-xl hover:shadow-red-500 hover:scale-105 duration-300 hover:from-[#be123c] hover:to-[#fb7185]">
                            <svg viewBox="0 0 15 15" class="w-5 fill-white">
                                <svg class="w-6 h-6" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                                        stroke-linejoin="round" stroke-linecap="round"></path>
                                </svg>
                                Button
                            </svg>
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
