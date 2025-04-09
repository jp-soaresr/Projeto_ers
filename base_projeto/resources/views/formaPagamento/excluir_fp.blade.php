<div class="modal fade" id="ExcluirFormaPagamentoModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form id="formExcluirFormaPagamento" method="POST">
      @csrf
      @method('DELETE')
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title">Confirmar Exclusão</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
        </div>
        <div class="modal-body">
          Tem certeza que deseja excluir este produto?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-danger">Excluir</button>
        </div>
      </div>
    </form>
  </div>
</div>
