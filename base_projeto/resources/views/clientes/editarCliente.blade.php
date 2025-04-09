<!-- Modal Editar Cliente -->
<div class="modal fade" id="editarClienteModal" tabindex="-1" aria-labelledby="editarClienteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" id="formEditarCliente" class="modal-content">
      @csrf
      @method('PUT')
      <div class="modal-header">
        <h5 class="modal-title" id="editarClienteModalLabel">Editar Cliente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="editarNomeCliente" class="form-label">Nome</label>
          <input type="text" id="editarNomeCliente" name="nome" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="editarEmailCliente" class="form-label">E-mail</label>
          <input type="email" id="editarEmailCliente" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="editarTelefoneCliente" class="form-label">Telefone</label>
          <input type="text" id="editarTelefoneCliente" name="telefone" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="editarEnderecoCliente" class="form-label">Endereço</label>
          <input type="text" id="editarEnderecoCliente" name="endereco" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="editarCpfOuCnpjCliente" class="form-label">CPF ou CNPJ</label>
          <input type="text" name="cpf_cnpj" id="editarCpfCnpjCliente" class="form-control" required>

        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
      </div>
    </form>
  </div>
</div>
