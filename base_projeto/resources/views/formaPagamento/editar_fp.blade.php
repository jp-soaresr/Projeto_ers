<div class="modal fade" id="editarFormaPagamentoModal" tabindex="-1" aria-labelledby="editarFormaPagamentoModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" id="formEditarFormaPagamento">
      @csrf
      @method('PUT')
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editarFormaPagamentoModalLabel">Editar forma de pagamento</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
        </div>
        <div class="modal-body">
          {{-- Exibe mensagens de erro --}}
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul class="mb-0">
                @foreach ($errors->all() as $erro)
                  <li>{{ $erro }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <div class="mb-3">
            <label for="editarNomeFormaPagamento" class="form-label">Forma de pagamento</label>
            <input type="text" class="form-control" id="editarNomeFormaPagamento" name="forma_pagamento" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Salvar Alterações</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </form>
  </div>
</div>
