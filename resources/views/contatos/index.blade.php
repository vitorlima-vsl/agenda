<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agenda de Contatos</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>

<body>

    <div class="bg-clip-border border-2 border-black border-rounder border-dashed p-4 shadow  sm:w-2/4 xl:w-1/4 ">
        <div class="grid grid-cols-2 ">
            <div>
                <h1 class="text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl">
                    AGENDA</h1>
            </div>
            <div class="flex content-start justify-end">
                <button onclick="window.location.href='/create'"
                    class="group cursor-pointer outline-none hover:rotate-90 duration-300 h-4 w-4 md:h-6 md:w-6 mt-2 me-2   absolute"
                    title="Add New">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg>
                    </svg>
                </button>
            </div>
        </div>

        @foreach ($contatos as $contato)
            <div class="grid grid-cols-2 p-2 rounded shadow w-full " id="mainDiv">
                <div class="">
                    <p class="text-lg text-[#434955] font-bold">
                        {{ $contato->nome }}
                    </p>

                    <div class="grid">
                        <p class="font-semibold text-[#3F5376]">{{ '(' . substr($contato->telefoneNumero[0]->numero, 0, 2) . ') ' . substr($contato->telefoneNumero[0]->numero, 2, 1) . ' ' . substr($contato->telefoneNumero[0]->numero, 3, 4) . '-' . substr($contato->telefoneNumero[0]->numero, 7) }}</p>

                        </p>

                    </div>
                </div>
                    <div class="flex content-start justify-end ">
                        <button onclick="toggleMenu(this)"
                            class="group cursor-pointer outline-none hover:rotate-90 duration-300 h-6 w-6 mt-1  absolute"
                            title="Add New">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-4 h-4 ml-1 fill-white">
                                <path fill="none" d="M0 0h24v24H0z"></path>
                                <path fill="currentColor"
                                    d="M12 13.172l4.95-4.95 1.414 1.414L12 16 5.636 9.636 7.05 8.222z"></path>
                            </svg>
                        </button>
                        <div class="flex">
                            <p class="flex content-end ms-2 font-bold text-[#85A0D4]" style="
                            align-items: flex-end;">
                                @if ($contato->telefoneNumero[0]->tipo == 0)
                                    Fixo
                                @else
                                    Celular
                                @endif
                            </p>
                        </div>
                    </div>
                <div class="menuOptions mt-2 gap-2" style="display: none; ">
                    <form action="/show/{{ $contato->id }}" method="GET">
                        @csrf


                        <button class="edit-button bg-[#3B82F6] hover:bg-[#3B82F6] w-14 h-6 rounded-md before:content-['Visualizar']">

                            <svg class="edit-svgIcon w-6 h-4 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                        </button>

                    </form>

                    <form action="/edit/{{ $contato->id }}" method="GET">
                        @csrf


                        <button class="edit-button bg-[#8EA05C] hover:bg-[#8EA05C] w-14 h-6 rounded-md before:content-['Editar']">
                            <svg class="edit-svgIcon w-4 h-6" viewBox="0 0 512 512">
                                <path
                                    d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z">
                                </path>
                            </svg>
                        </button>



                    </form>


                    <form action="/destroy/{{ $contato->id }}" method="POST">
                        @method('DELETE')
                        @csrf


                        <button class="edit-button bg-[#F5533B] hover:bg-[#F5533B] w-14 h-6 rounded-md before:content-['Excluir']">
                            <svg viewBox=" 0 0 15 15" class="w-5 fill-white edit-svgIcon">
                                <svg class="w-6 h-6 fill-white" stroke="currentColor" stroke-width="1.5"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
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

    </div>

</body>
<script src="{{ asset('app.js') }}"></script>

</html>
