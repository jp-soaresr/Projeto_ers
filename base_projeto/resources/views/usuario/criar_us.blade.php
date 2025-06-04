<!-- Modal Novo Usuário -->
<div class="modal fade" id="novoUsuarioModal" tabindex="-1" aria-labelledby="novoUsuarioModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('usuarios.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Novo Usuário</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-2">
                        <label>Nome:</label>
                        <input type="text" name="nome" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label>Email:</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label>Senha:</label>
                        <input type="password" name="senha" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label>Telefone:</label>
                        <input type="text" name="telefone" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label>Nível:</label>
                        <select name="nivel" class="form-control" required>
                            <option value="admin">Admin</option>
                            <option value="gestor">Gestor</option>
                            <option value="vendedor">Vendedor</option>
                        </select>
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
