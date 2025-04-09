<!-- Modal Confirmar Exclusão Cliente -->
<div class="modal fade" id="modalConfirmarExcluirCliente" tabindex="-1" aria-labelledby="modalConfirmarExcluirClienteLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" id="formExcluirCliente" class="modal-content">
      @csrf
      @method('DELETE')
      <div class="modal-header">
        <h5 class="modal-title" id="modalConfirmarExcluirClienteLabel">Confirmar Exclusão</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body">
        Tem certeza que deseja excluir este cliente?
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger">Excluir</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
      </div>
    </form>
  </div>
</div>
