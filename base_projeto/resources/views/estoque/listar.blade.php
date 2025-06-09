@extends('layout')

@section('conteudo')
<style>
    :root {
        --verde-principal: #79b7b4;
        --azul-editar: #007bff;
        --vermelho-excluir: #dc3545;
        --cinza-claro: #f5f5f5;
        --bg-listrado: #e0f0ef;
    }

    body {
        background-color: var(--cinza-claro);
    }

    h1 {
        color: var(--verde-principal);
    }

    .btn-novo {
        background-color: rgb(60, 193, 120);
        border-color: rgb(60, 193, 120);
        color: white;
    }

    .btn-novo:hover {
        background-color: rgb(34, 119, 72);
        border-color: rgb(34, 119, 72);
    }

    .btn-editar {
        background-color: var(--azul-editar);
        border-color: var(--azul-editar);
        color: white;
        padding: 6px 16px;
        font-size: 0.95rem;
    }

    .btn-editar:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    .btn-excluir {
        background-color: var(--vermelho-excluir);
        border-color: var(--vermelho-excluir);
        color: white;
        padding: 6px 16px;
        font-size: 0.95rem;
    }

    .btn-excluir:hover {
        background-color: #a71d2a;
        border-color: #a71d2a;
    }

    .btn-relatorio {
        background-color: #6c63ff;
        border-color: #6c63ff;
        color: white;
        padding: 6px 16px;
        font-size: 0.95rem;
        transition: background 0.2s, border 0.2s;
    }

    .btn-relatorio:hover {
        background-color: #4b47b7;
        border-color: #4b47b7;
    }

    .table {
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.07);
        border-radius: 12px;
        overflow: hidden;
    }

    thead tr {
        font-size: 1.08rem;
        letter-spacing: 0.5px;
    }

    tbody tr {
        vertical-align: middle;
        font-size: 1.01rem;
    }

    .table-responsive {
        border-radius: 12px;
        background: #fff;
        padding: 18px 12px 8px 12px;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.04);
    }

    .btn i {
        margin-right: 5px;
    }

    .btn {
        box-shadow: 0 1px 4px rgba(0, 0, 0, 0.04);
        border-radius: 6px;
    }

    .mb-4 h1 {
        font-weight: 700;
        letter-spacing: 1px;
        text-shadow: 0 2px 8px rgba(121, 183, 180, 0.08);
    }

    @media (max-width: 600px) {
        .table-responsive {
            padding: 6px 2px 2px 2px;
        }

        .mb-3.d-flex {
            flex-direction: column !important;
            align-items: stretch !important;
        }

        .btn {
            width: 100%;
            margin-bottom: 6px;
        }
    }
</style>

<div class="mb-4">
    <h1 class="text-center">Produtos</h1>
</div>

<div class="mb-3 d-flex justify-content-between align-items-center flex-wrap gap-2">
    <div>
        <button class="btn btn-novo me-2 mb-2" data-bs-toggle="modal" data-bs-target="#novoProdutoModal">
            <i class="fas fa-plus"></i> Novo Produto
        </button>

        <a href="{{ route('estoque.relatorio') }}" class="btn btn-relatorio mb-2">
            <i class="fas fa-file-alt"></i> Gerar Relatório
        </a>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped table-bordered shadow-sm rounded">
        <thead style="background-color: var(--verde-principal); color: white;">
            <tr>
                <th>ID</th>
                <th>Nome do Item</th>
                <th>Quantidade</th>
                <th>Valor</th>
                <th>Categoria</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($produtos as $produto)
            <tr>
                <td>{{ $produto->id }}</td>
                <td>{{ $produto->produto }}</td>
                <td>{{ $produto->estoque }}</td>
                <td>R$ {{ number_format($produto->valor, 2, ',', '.') }}</td>
                <td>{{ $produto->categoria->categoria ?? '—' }}</td>
                <td class="text-center">
                    <div class="d-flex justify-content-center gap-2">
                        <button
                            class="btn btn-editar"
                            data-id="{{ $produto->id }}"
                            data-nome="{{ $produto->produto }}"
                            data-estoque="{{ $produto->estoque }}"
                            data-valor="{{ $produto->valor }}"
                            data-categoria="{{ $produto->categoria->categoria ?? '' }}">
                            <i class="fas fa-edit"></i> Editar
                        </button>
                        <button
                            class="btn btn-excluir"
                            data-id="{{ $produto->id }}">
                            <i class="fas fa-trash-alt"></i> Excluir
                        </button>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">Nenhum produto cadastrado.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Editar
        document.querySelectorAll('.btn-editar').forEach(btn => {
            btn.addEventListener('click', () => {
                const modal = new bootstrap.Modal(document.getElementById('editarProdutoModal'));
                const form = document.getElementById('formEditarProduto');

                form.action = `/estoque/${btn.dataset.id}`;
                document.getElementById('editarNome').value = btn.dataset.nome;
                document.getElementById('editarQuantidade').value = btn.dataset.estoque;
                document.getElementById('editarValor').value = btn.dataset.valor;
                document.getElementById('editarCategoria').value = btn.dataset.categoria;

                modal.show();
            });
        });


        // Excluir
        document.querySelectorAll('.btn-excluir').forEach(btn => {
            btn.addEventListener('click', () => {
                const modal = new bootstrap.Modal(document.getElementById('modalConfirmacao'));
                document.getElementById('formExcluir').action = `/estoque/${btn.dataset.id}`;
                modal.show();
            });
        });
    });
</script>

@include('estoque.confirmarExcluir')
@include('estoque.editarProduto')
@include('estoque.novoProduto')
@endsection