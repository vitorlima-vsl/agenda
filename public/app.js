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
