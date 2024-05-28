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
        removeButton.type = 'button';
        removeButton.className = 'button hover:shadow-lg shadow-red-500/50 hover:shadow-red-500/100 bg-[#F5533B] border-red-400 hover:border-red-600 text-white font-bold py-2 px-4';
        removeButton.onclick = function() { removeTelefone(this); };

        var p = document.createElement('p');
        p.className = 'text-xs';
        p.textContent = 'Remover';

        removeButton.appendChild(p);
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
//hamburguer
function toggleMenu(button) {
    var menuOptions = button.parentElement.nextElementSibling;

    if (menuOptions.style.display === "none") {
        menuOptions.style.display = "flex";
    } else {
        menuOptions.style.display = "none";
    }
}
