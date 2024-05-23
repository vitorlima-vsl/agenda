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


    <form action="{{ Route('contatos.store') }}" method="POST">
        @csrf
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" value="{{ isset($contato) ? $contato->nome : null }}"
            {{ isset($form) ? $form : null }}>
        {{-- quero fazer a insercao de mais numeros com JS, entao vou esperar para criar na proxima issue, mas ja esta adaptado a ter mais de um numero. --}}

        <div id="telefoneDiv">
            <div>
                <label for="telefoneNumero">Telefone</label>
                <input type="text" name="telefoneNumero[]" id="telefoneNumero" value="">
                <label for="tipo">Tipo</label>
                <select id="contarSelect" name="tipo[]">
                    @foreach ($tipoTelefones as $tipoTelefone)
                        <option value="{{ $loop->index }}">{{ $tipoTelefone }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <button id="addTelefone" type="button">Adicionar mais telefone</button>

        <label for="cidade" style="margin-left: 0.5rem;">Cidade</label>
        <input type="text" name="cidade" id="cidade">
        <label for="rua">Rua</label>
        <input type="text" name="rua" id="rua">
        <label for="numero">Numero</label>
        <input type="text" name="numero" id="numero">


        @foreach ($categorias as $key => $categoria)
            <input type="checkbox" name="categorias[]" value="{{ $key }}">{{ $categoria }}
        @endforeach
        <button type="submit">Salvar</button>
        <button type="button" onclick="window.location.href='/index'">Cancelar</button>
    </form>
    <a href="/index">Ver Contatos</a>

</body>
<script>
    document.getElementById('addTelefone').addEventListener('click', function(event) {
        const selects = document.querySelectorAll('select');
            if (selects.length < 2)
            {
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
        }
            else {
                alert('Você já adicionou o número máximo de telefones!');
            }
        });

</script>

</html>
