<div class="modal fade" id="criarFormaPagamentoModal" tabindex="-1" aria-labelledby="criarFormaPagamentoModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" action="{{ route('forma_pagamentos.store') }}">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="criarFormaPagamentoModalLabel">Nova forma de pagamento</h5>
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
            <label for="forma_pagamento" class="form-label">Forma de pagamento</label>
            <input type="text" name="forma_pagamento" class="form-control" required>
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
