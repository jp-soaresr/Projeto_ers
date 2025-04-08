<!-- Modal Novo Cliente -->
<div class="modal fade" id="novoClienteModal" tabindex="-1" aria-labelledby="novoClienteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{ route('clientes.store') }}" method="POST" class="modal-content">
      @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="novoClienteModalLabel">Novo Cliente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="nomeCliente" class="form-label">Nome</label>
          <input type="text" name="nome" id="nomeCliente" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="emailCliente" class="form-label">E-mail</label>
          <input type="email" name="email" id="emailCliente" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="telefoneCliente" class="form-label">Telefone</label>
          <input type="text" name="telefone" id="telefoneCliente" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="enderecoCliente" class="form-label">Endereço</label>
          <input type="text" name="endereco" id="enderecoCliente" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="cpfOuCnpjCliente" class="form-label">CPF ou CNPJ</label>
          <input type="text" name="cpf_cnpj" id="cpfCnpjCliente" class="form-control" required>


        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Salvar</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
      </div>
    </form>
  </div>
</div>
