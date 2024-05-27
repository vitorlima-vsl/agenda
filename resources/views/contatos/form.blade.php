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

<body class="">

    {{-- Eu não incluí o formulário de exibição aqui porque eu queria fazer algo diferente,
        mas você poderia usar o formulário de criação para exibir as informações
        com os campos desabilitados que não seria problema --}}

    <div class="bg-clip-border border-2 border-black border-rounder border-dashed p-4 shadow  sm:w-2/4 xl:w-1/4 ">

        <div class="grid grid-cols-2">

            <form
                action="{{ Route::currentRouteName() == 'contatos.edit' ? '/update/' . $contato->id : Route('contatos.store') }}"
                method="POST">
                @csrf
                @if (Route::currentRouteName() == 'contatos.edit')
                    @method('PUT')
                @endif
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" value="{{ isset($contato) ? $contato->nome : null }}"
                    required>

                <div id="telefoneDiv">
                    @if (isset($contato))
                        @foreach ($contato->telefoneNumero as $telefone)
                            <div>
                                <input type="text" name="telefoneNumero[]" value="{{ $telefone->numero }}" required>
                                <select name="tipo[]">
                                    @foreach ($tipoTelefones as $index => $tipoTelefone)
                                        <option value="{{ $index }}"
                                            @if ($index == $telefone->tipo) selected @endif>
                                            {{ $tipoTelefone }}</option>
                                    @endforeach
                                </select>
                                @if (!$loop->first)
                                    <button type="button" onclick="removeTelefone(this)">Remover</button>
                                @endif
                            </div>
                        @endforeach
                    @else
                        <div>
                            <input type="text" name="telefoneNumero[]" value="" required>
                            <select name="tipo[]">
                                @foreach ($tipoTelefones as $index => $tipoTelefone)
                                    <option value="{{ $index }}">{{ $tipoTelefone }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                </div>
                <button id="addTelefone" type="button">Adicionar mais telefone</button>

                <label for="cidade">cidade</label>
                <input type="text" name="cidade" id="cidade"
                    value="{{ isset($contato) ? $contato->endereco->cidade : '' }}" required>
                <label for="rua">rua</label>
                <input type="text" name="rua" id="rua"
                    value="{{ isset($contato) ? $contato->endereco->rua : '' }}" required>
                <label for="numero">numero</label>
                <input type="text" name="numero" id="numero"
                    value="{{ isset($contato) ? $contato->endereco->numero : '' }}" required>

                @foreach ($categorias as $key => $categoria)
                    <input type="checkbox" name="categorias[]" value="{{ $key }}"
                        @if (isset($contato) && $contato->categoria->contains($key)) checked @endif>{{ $categoria }}
                @endforeach

                <button type="submit">Salvar</button>
            </form>
            <div style="margin-top: 1rem">
                <button type="button" onclick="window.location.href='/index'">Cancelar</button>
                @if (isset($contato))
                    <form action="/destroy/{{ $contato->id }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit">Apagar Contato</button>
                    </form>
                @endif
            </div>

        </div>

    </div>

</body>
<script src="{{ asset('app.js') }}"></script>

</html>
