<!-- Modal Nova Categoria -->
<div class="modal fade" id="novaCategoriaModal" tabindex="-1" aria-labelledby="novaCategoriaModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" action="{{ route('categorias.store') }}">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nova Categoria</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="nomeCategoria" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nomeCategoria" name="categoria" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Salvar</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </form>
  </div>
</div>
