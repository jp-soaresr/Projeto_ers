
// pegando elementos do usuario para preenchera a modal de edição

    document.querySelectorAll('.btn-editar').forEach(botao => {
        botao.addEventListener('click', () => {
            const modal = new bootstrap.Modal(document.getElementById('modalProduto'));
            document.getElementById('formProduto').action = `/estoque/${botao.dataset.id}`;
            document.querySelector('#formProduto input[name="_method"]').value = 'PUT';
            document.getElementById('nome').value = botao.dataset.nome;
            document.getElementById('quantidade').value = botao.dataset.quantidade;
            document.getElementById('descricao').value = botao.dataset.descricao;
            document.getElementById('categoria').value = botao.dataset.categoria;
            modal.show();
        });
    });



// chamndo o botao de excluir


    document.querySelectorAll('.btn-excluir').forEach(botao => {
        botao.addEventListener('click', () => {
            const modal = new bootstrap.Modal(document.getElementById('modalConfirmacao'));
            document.getElementById('formExcluir').action = `/estoque/${botao.dataset.id}`;
            modal.show();
        });
    });

