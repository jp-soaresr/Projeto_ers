<!-- Modal Editar Usuário -->
<div class="modal fade" id="editarUsuarioModal" tabindex="-1" aria-labelledby="editarUsuarioModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" id="formEditarUsuario">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Usuário</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-2">
                        <label>Nome:</label>
                        <input type="text" name="nome" id="editarNomeUsuario" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label>Email:</label>
                        <input type="email" name="email" id="editarEmailUsuario" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label>Senha (opcional):</label>
                        <input type="password" name="senha" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label>Telefone:</label>
                        <input type="text" name="telefone" id="editarTelefoneUsuario" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label>Nível:</label>
                        <select name="nivel" id="editarNivelUsuario" class="form-control" required>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </form>
    </div>
</div>
