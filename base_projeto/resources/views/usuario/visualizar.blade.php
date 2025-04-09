@extends('layout')

@section('conteudo')
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Usuários</h2>
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#novoUsuarioModal">
            Novo Usuário
        </button>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Nível</th>
                <th class="text-center" style="width: 160px;">Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->nome }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->telefone }}</td>
                    <td>{{ $usuario->nivel }}</td>

                    <td class="text-center">
                        <button class="btn btn-primary btn-sm btn-editar-usuario"
                            data-id="{{ $usuario->id }}"
                            data-nome="{{ $usuario->nome }}"
                            data-email="{{ $usuario->email }}"
                            data-telefone="{{ $usuario->telefone }}"
                            data-nivel="{{ $usuario->nivel }}">
                            Editar
                        </button>
                        <button class="btn btn-danger btn-sm btn-excluir-usuario"
                            data-id="{{ $usuario->id }}">
                            Excluir
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Nenhum usuário cadastrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Botões de edição
    document.querySelectorAll('.btn-editar-usuario').forEach(function(botao) {
        botao.addEventListener('click', function() {
            const modal = new bootstrap.Modal(document.getElementById('editarUsuarioModal'));
            const form = document.getElementById('formEditarUsuario');
            form.action = `/usuarios/${botao.dataset.id}`;
            document.getElementById('editarNomeUsuario').value = botao.dataset.nome;
            document.getElementById('editarEmailUsuario').value = botao.dataset.email;
            document.getElementById('editarTelefoneUsuario').value = botao.dataset.telefone;
            document.getElementById('editarNivelUsuario').value = botao.dataset.nivel;
            modal.show();
        });
    });

    // Botões de exclusão
    document.querySelectorAll('.btn-excluir-usuario').forEach(function(botao) {
        botao.addEventListener('click', function() {
            const modal = new bootstrap.Modal(document.getElementById('modalConfirmarExcluirUsuario'));
            document.getElementById('formExcluirUsuario').action = `/usuarios/${botao.dataset.id}`;
            modal.show();
        });
    });
});
</script>

@include('usuario.criar_us')
@include('usuario.editar_us')
@include('usuario.excluir_us')
@endsection
