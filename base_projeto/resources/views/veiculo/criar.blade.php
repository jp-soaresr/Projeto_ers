<!-- resources/views/estoque/criar_veiculo.blade.php -->
<div class="modal fade" id="novoVeiculoModal" tabindex="-1" aria-labelledby="novoVeiculoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('veiculo.store') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="novoVeiculoModalLabel">Novo veículo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="marca" class="form-label">Marca</label>
                        <input type="text" name="marca" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="modelo" class="form-label">Modelo</label>
                        <input type="text" name="modelo" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="placa" class="form-label">Placa</label>
                        <input type="text" name="placa" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="id_cliente" class="form-label">Proprietário</label>
                        <select name="id_cliente" class="form-select" required>
                            <option value="" disabled selected>Selecione um cliente</option>
                            @foreach ($clientes as $cliente)
                            <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                            @endforeach
                        </select>
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