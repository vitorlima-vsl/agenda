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

    {{-- Eu não incluí o formulário de exibição aqui porque eu queria fazer algo diferente,
        mas você poderia usar o formulário de criação para exibir as informações
        com os campos desabilitados que não seria problema --}}
    <form
        action="{{ Route::currentRouteName() == 'contatos.edit' ? '/update/' . $contato->id : Route('contatos.store') }}"
        method="POST">
        @csrf
        @if (Route::currentRouteName() == 'contatos.edit')
            @method('PUT')
        @endif
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" value="{{ isset($contato) ? $contato->nome : null }}">

        <div id="telefoneDiv">
            @if (isset($contato))
                @foreach ($contato->telefoneNumero as $telefone)
                    <div>
                        <input type="text" name="telefoneNumero[]" value="{{ $telefone->numero }}">
                        <select name="tipo[]">
                            @foreach ($tipoTelefones as $index => $tipoTelefone)
                                <option value="{{ $index }}" @if ($index == $telefone->tipo) selected @endif>
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
                    <input type="text" name="telefoneNumero[]" value="">
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
            value="{{ isset($contato) ? $contato->endereco->cidade : '' }}">
        <label for="rua">rua</label>
        <input type="text" name="rua" id="rua"
            value="{{ isset($contato) ? $contato->endereco->rua : '' }}">
        <label for="numero">numero</label>
        <input type="text" name="numero" id="numero"
            value="{{ isset($contato) ? $contato->endereco->numero : '' }}">

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
</body>
<script>
    document.getElementById('addTelefone').addEventListener('click', function(event) {
        const selects = document.querySelectorAll('select');
        if (selects.length < 2) {
            event.preventDefault();
            var telefoneDiv = document.getElementById('telefoneDiv');
            var newTelefoneDiv = telefoneDiv.querySelector('div').cloneNode(true);

            // Limpa o valor do campo de entrada de texto e o valor selecionado do select
            newTelefoneDiv.querySelector('input[type="text"]').value = '';
            newTelefoneDiv.querySelector('select').selectedIndex = 0;

            // Adiciona o botão de remover ao novo div
            var removeButton = document.createElement('button');
            removeButton.textContent = 'Remover';
            removeButton.addEventListener('click', function(event) {
                event.preventDefault();
                this.parentNode.remove();
            });
            newTelefoneDiv.appendChild(removeButton);

            // Adiciona o novo div ao telefoneDiv
            telefoneDiv.appendChild(newTelefoneDiv);
        } else {
            alert('Você já adicionou o número máximo de telefones!');
        }
    });

    function removeTelefone(button) {
        button.parentNode.remove();
    }
</script>

</html>
