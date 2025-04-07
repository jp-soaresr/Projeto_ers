<!-- resources/views/categorias/novoProduto.blade.php -->
<div class="modal fade" id="novoProdutoModal" tabindex="-1" aria-labelledby="novoProdutoModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" action="{{ route('estoque.store') }}">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="novoProdutoModalLabel">Novo Produto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="produto" class="form-label">Nome do Produto</label>
            <input type="text" name="produto" class="form-control" required>
          </div>

          <div class="mb-3">
            <label for="estoque" class="form-label">Estoque</label>
            <input type="number" name="estoque" class="form-control" required min="0">
          </div>


          <div class="mb-3">
            <label for="categoria_id" class="form-label">Categoria</label>
            <select name="categoria_id" class="form-select" required>
              <option value="" disabled selected>Selecione uma categoria</option>
              @foreach ($categorias as $categoria)
              <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
              @endforeach
            </select>
          </div>



          <div class="mb-3">
            <label for="valor" class="form-label">Valor</label>
            <input type="number" name="valor" class="form-control" required step="0.01" min="0">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-success">Salvar</button>
        </div>
      </div>
    </form>
  </div>
</div>