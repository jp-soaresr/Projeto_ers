@extends('layout')

@section('conteudo')
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Categorias</h2>
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#novaCategoriaModal">
            Nova Categoria
        </button>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>Nome da Categoria</th>
                <th class="text-center" style="width: 160px;">Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->categoria }}</td>
                    <td class="text-center">
                        <button class="btn btn-primary btn-sm btn-editar-categoria"
                            data-id="{{ $categoria->id }}"
                            data-nome="{{ $categoria->categoria }}">
                            Editar
                        </button>
                        <button class="btn btn-danger btn-sm btn-excluir-categoria"
                            data-id="{{ $categoria->id }}">
                            Excluir
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">Nenhuma categoria cadastrada.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {

        // Editar categoria
        document.querySelectorAll('.btn-editar-categoria').forEach(botao => {
            botao.addEventListener('click', () => {
                const modal = new bootstrap.Modal(document.getElementById('editarCategoriaModal'));
                const form = document.getElementById('formEditarCategoria');

                form.action = `/categorias/${botao.dataset.id}`;
                document.getElementById('editarNomeCategoria').value = botao.dataset.nome;

                modal.show();
            });
        });

        // Excluir categoria
        document.querySelectorAll('.btn-excluir-categoria').forEach(botao => {
            botao.addEventListener('click', () => {
                const modal = new bootstrap.Modal(document.getElementById('modalConfirmarExcluirCategoria'));
                const form = document.getElementById('formExcluirCategoria');

                form.action = `/categorias/${botao.dataset.id}`;
                modal.show();
            });
        });

    });
</script>

@include('categoria.novaCategoria')
@include('categoria.editarCategoria')
@include('categoria.confirmarExcluir')

@endsection



