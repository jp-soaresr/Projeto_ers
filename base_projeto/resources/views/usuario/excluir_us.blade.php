<!-- Modal Confirmar Exclusão -->
<div class="modal fade" id="modalConfirmarExcluirUsuario" tabindex="-1" aria-labelledby="modalConfirmarExcluirUsuarioLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" id="formExcluirUsuario">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Excluir Usuário</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    Tem certeza de que deseja excluir este usuário?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Excluir</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </form>
    </div>
</div>
