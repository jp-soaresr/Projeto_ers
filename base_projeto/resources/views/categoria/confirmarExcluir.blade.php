<!-- Modal Confirmar Exclusão -->
<div class="modal fade" id="modalConfirmarExcluirCategoria" tabindex="-1" aria-labelledby="modalConfirmarExcluirCategoriaLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" id="formExcluirCategoria">
        @csrf
        @method('DELETE')
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Excluir Categoria</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                Tem certeza de que deseja excluir esta categoria?
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger">Sim, excluir</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </form>
  </div>
</div>
