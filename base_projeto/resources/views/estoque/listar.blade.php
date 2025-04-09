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

    .table-striped>tbody>tr:nth-of-type(odd) {
        background-color: var(--bg-listrado);
    }

    .btn i {
        margin-right: 5px;
    }
</style>

<div class="mb-4">
    <h1 class="text-center">Estoque</h1>
</div>

<div class="mb-3 text-start">
    <button class="btn btn-novo" data-bs-toggle="modal" data-bs-target="#novoProdutoModal">
        <i class="fas fa-plus"></i> Novo Produto
    </button>

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
                <th>Forma de Pagamento</th>
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
                <td>{{ $produto->formaPagamento->forma_pagamento ?? '—' }}</td>
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
                document.getElementById('editarFormaPagamento').value = btn.dataset.formaPagamento;

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