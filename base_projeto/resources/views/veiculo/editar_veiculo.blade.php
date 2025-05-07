<!-- resources/views/estoque/editar_veiculo.blade.php -->
<div class="modal fade" id="editarVeiculoModal" tabindex="-1" aria-labelledby="editarVeiculoModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" id="formEditarVeiculo">
      @csrf
      @method('PUT')
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editarVeiculoModalLabel">Editar Veículo</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="editarMarca" class="form-label">Marca</label>
            <input type="text" class="form-control" id="editarMarca" name="marca" required>
          </div>
          <div class="mb-3">
            <label for="editarModelo" class="form-label">Modelo</label>
            <input type="number" class="form-control" id="editarModelo" name="modelo" required>
          </div>
          <div class="mb-3">
            <label for="editarPlaca" class="form-label">Valor</label>
            <input type="number" class="form-control" id="editarPlaca" name="placa" required>
          </div>
          <div class="mb-3">
            <label for="editarCliente" class="form-label">Proprietário</label>
            <select id="editarCliente" name="id_cliente" class="form-select">
              <option value="" disabled>Selecione um cliente</option>
              @foreach ($clientes as $cliente)
                <option value="{{ $cliente->id }}">{{ $cliente->cliente }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </div>
      </div>
    </form>
  </div>
</div>
