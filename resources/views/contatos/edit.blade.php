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


    <form action="/update/{{ $contato->id }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" value="{{ $contato->nome }}">

        <label for="telefoneNumero">Telefone</label>

        <div id="telefoneDiv">
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
        </div>
        <button id="addTelefone" type="button">Adicionar mais telefone</button>

        <label for="cidade">cidade</label>
        <input type="text" name="cidade" id="cidade" value="{{ $contato->endereco->cidade }}">
        <label for="rua">rua</label>
        <input type="text" name="rua" id="rua" value="{{ $contato->endereco->rua }}">
        <label for="numero">numero</label>
        <input type="text" name="numero" id="numero" value="{{ $contato->endereco->numero }}">


        @foreach ($categorias as $key => $categoria)
            <input type="checkbox" name="categorias[]" value="{{ $key }}"
                @if ($contato->categoria->contains($key)) checked @endif>{{ $categoria }}
        @endforeach

    </form>
    <div style="margin-top: 1rem">

        <button type="submit">Salvar</button>
        <button type="button" onclick="window.location.href='/index'">Cancelar</button>
        <form action="/destroy/{{$contato->id}}" method="POST">
            @method("DELETE")
            @csrf
            <button type="submit" >Apagar Contato</button>
        </form>
    </div>



</body>
<script>



    document.getElementById('addTelefone').addEventListener('click', function(event) {
        const selects = document.querySelectorAll('select');
            if(selects.length < 2){
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
        else{
            alert("Você já adicionou o máximo de telefones permitidos");}
     });
     // Função para carregar o botão de remover o telefone em um form preenchido de visualização de contato
     function removeTelefone(button) {
         button.parentNode.remove();
     }

</script>


</html>
