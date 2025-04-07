<!-- resources/views/estoque/editarProduto.blade.php -->
<div class="modal fade" id="editarProdutoModal" tabindex="-1" aria-labelledby="editarProdutoModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" id="formEditarProduto">
      @csrf
      @method('PUT')
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editarProdutoModalLabel">Editar Produto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="editarNome" class="form-label">Nome do Produto</label>
            <input type="text" class="form-control" id="editarNome" name="produto" required>
          </div>
          <div class="mb-3">
            <label for="editarQuantidade" class="form-label">Quantidade</label>
            <input type="number" class="form-control" id="editarQuantidade" name="estoque" required>
          </div>
          <div class="mb-3">
            <label for="editarDescricao" class="form-label">Descrição</label>
            <textarea class="form-control" id="editarDescricao" name="descricao"></textarea>
          </div>
          <div class="mb-3">
            <label for="editarCategoria" class="form-label">Categoria</label>
            <input type="text" class="form-control" id="editarCategoria" name="categoria">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </div>
      </div>
    </form>
  </div>
</div>
