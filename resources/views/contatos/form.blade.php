<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    {{-- links --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />


</head>

<body class="flex justify-center">

    {{-- Eu não incluí o formulário de exibição aqui porque eu queria fazer algo diferente,
        mas você poderia usar o formulário de criação para exibir as informações
        com os campos desabilitados que não seria problema --}}

        <div class="bg-clip-border border-2 border-black border-rounder border-dashed p-4 shadow  sm:w-2/4 xl:w-1/4">
            <form
                action="{{ Route::currentRouteName() == 'contatos.edit' ? '/update/' . $contato->id : Route('contatos.store') }}"
                method="POST">
                @csrf
                @if (Route::currentRouteName() == 'contatos.edit')
                    @method('PUT')
                @endif

            <div class="grid grid-cols-1 gap-2">
                <div class="grid grid-cols-2">
                    <div>

                        <label for="nome">
                            <p class="text-base font-bold">Nome:</p>
                        </label>
                        <input placeholder="Nome" name="nome" id="nome"
                            class="button hover:shadow-lg bg-white border-2 border-blue-400 col-span-2 rounded-lg text-black px-6 py-3 text-base hover:border-blue-500 active:border-blue-500 cursor-pointer transition"
                            type="text"  value="{{ isset($contato) ? $contato->nome : null }}" required/>
                    </div>
                    <div class="flex content-start justify-end">
                        @if (isset($contato))
                            <form action="/destroy/{{ $contato->id }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button
                                    class="edit-button bg-[#F5533B] hover:bg-[#F5533B] w-14 h-6 rounded-md before:content-['Excluir']">
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
                        @endif
                    </div>
                </div>

                <div id="telefoneDiv" class="grid gap-2">
                    <label for="">
                        <p class="text-base font-bold ">Telefone: </p>
                    </label>
                    @if (isset($contato))
                        @foreach ($contato->telefoneNumero as $telefone)
                            <div class="">
                                <select class="button w-16 text-xs p-0 me-1" name="tipo[]">
                                    @foreach ($tipoTelefones as $index => $tipoTelefone)
                                        <option value="{{ $index }}"
                                            @if ($index == $telefone->tipo) selected @endif>
                                            {{ $tipoTelefone }}</option>
                                    @endforeach
                                </select>
                                <input
                                    class="button hover:shadow-lg bg-white border-2  border-blue-400 rounded-lg text-black px-6 py-3 text-base hover:border-blue-500 cursor-pointer transition"
                                    type="text" name="telefoneNumero[]" value="{{ $telefone->numero }}" required>
                                @if (!$loop->first)
                                    <button type="button" onclick="removeTelefone(this)"
                                        class="button hover:shadow-lg shadow-red-500/50 hover:shadow-red-500/100 bg-[#F5533B] border-red-400 hover:border-red-600 text-white font-bold py-2 px-4">
                                        <p class="text-xs">Remover</p>
                                    </button>
                                @endif
                            </div>
                        @endforeach
                    @else
                        <div>
                            <select class="button w-16 text-xs p-0 me-1" name="tipo[]">
                                @foreach ($tipoTelefones as $index => $tipoTelefone)
                                    <option value="{{ $index }}">{{ $tipoTelefone }}</option>
                                @endforeach
                            </select>
                            <input
                                class="button hover:shadow-lg bg-white border-2 border-blue-400 rounded-lg text-black px-6 py-3 text-base hover:border-blue-500 cursor-pointer transition"
                                placeholder="Digite o Número" type="text" name="telefoneNumero[]" value=""
                                required>
                        </div>
                    @endif
                </div>
                <div class="">
                    <button
                        class="bg-[#3B82F6] border-2 border-blue-500 rounded-lg ms-2 text-white  text-base hover:border-blue-700 shadow-blue-500 shadow-md hover:shadow-blue-700 hover:shadow-md cursor-pointer transition"
                        id="addTelefone" type="button" role="button">
                        <p class="text-base font-semibold p-2">Adicionar Número</p>
                    </button>
                </div>


                <div class="grid grid-cols-2 gap-2 gap-x-14 ">
                    <div>
                        <label for="cidade">
                            <p class="text-base font-semibold mb-1">Cidade: </p>
                        </label>
                        <input
                            class="button hover:shadow-lg bg-white border-2 border-blue-400 rounded-lg text-black w-32 md:w-64  px-6 py-3 text-base hover:border-blue-500 cursor-pointer transition"
                            type="text" placeholder="Cidade" name="cidade" id="cidade"
                            value="{{ isset($contato) ? $contato->endereco->cidade : '' }}" required>
                    </div>
                    <div>
                        <label for="numero">
                            <p class="text-base font-semibold mb-1 ms-8">N&#176;:</p>
                        </label>
                        <input
                            class="button hover:shadow-lg bg-white border-2 border-blue-400 rounded-lg text-black w-16 md:w-24 ms-8 px-6 py-3 text-base hover:border-blue-500 cursor-pointer transition"
                            placeholder="N&#176; da Casa" type="text" name="numero" id="numero"
                            value="{{ isset($contato) ? $contato->endereco->numero : '' }}" required>
                    </div>
                    <div>
                        <label for="rua">
                            <p class="text-base font-semibold mb-1 ">Rua: </p>
                        </label>
                        <input
                            class="button hover:shadow-lg bg-white border-2 border-blue-400 rounded-lg text-black w-64 px-6 py-3 text-base hover:border-blue-500 cursor-pointer transition"
                            placeholder="Rua" type="text" name="rua" id="rua"
                            value="{{ isset($contato) ? $contato->endereco->rua : '' }}" required>
                    </div>
                </div>
                <p class="text-base font-bold ms-1">Categorias:</p>
                <div class="flex flex-col gap-2">
                    @foreach ($categorias as $key => $categoria)
                        <div class="flex">
                            <p class="text-xs md:text-base text-[#434955] font-semibold mx-2">{{ $categoria }}</p>
                            <input
                                class="border-white-400/20 scale-100 transition-all duration-500 ease-in-out hover:scale-110checked:scale-100 w-4 h-4 md:w-6 md:h-6"
                                type="checkbox" name="categorias[]" value="{{ $key }}"
                                @if (isset($contato) && $contato->categoria->contains($key)) checked @endif>
                        </div>
                    @endforeach
                </div>

                <div class="flex justify-center gap-2 mt-2">
                    <button class="button hover:shadow-lg " type="submit">
                        <p class="text-base font-semibold "> Salvar</p>
                    </button>
                    <button class="button hover:shadow-lg " type="button"
                        onclick="event.preventDefault(); window.location.href='/index'">
                        <p class="text-base font-semibold">Cancelar</p>
                    </button>
                </div>

            </div>
        </div>
    </form>



</body>
<script src="{{ asset('app.js') }}"></script>

</html>
