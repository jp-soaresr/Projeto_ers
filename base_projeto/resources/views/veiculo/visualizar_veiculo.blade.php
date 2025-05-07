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
    <h1 class="text-center">Veículo</h1>
</div>

<div class="mb-3 text-start">
    <button class="btn btn-novo" data-bs-toggle="modal" data-bs-target="#novoVeiculoModal">
        <i class="fas fa-plus"></i> Novo Veículo
    </button>

</div>

<div class="table-responsive">
    <table class="table table-striped table-bordered shadow-sm rounded">
        <thead style="background-color: var(--verde-principal); color: white;">
            <tr>
                <th>ID</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Placa</th>
                <th>Cliente</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($veiculos as $veiculo)
            <tr>
                <td>{{ $veiculo->id }}</td>
                <td>{{ $veiculo->marca }}</td>
                <td>{{ $veiculo->modelo }}</td>
                <td>{{ $veiculo->placa }}</td>
                <td>{{ $veiculo->cliente->cliente ?? '—' }}</td>
                <td class="text-center">
                    <div class="d-flex justify-content-center gap-2">
                        <button
                            class="btn btn-editar"
                            data-id="{{ $veiculo->id }}"
                            data-marca="{{ $veiculo->marca }}"
                            data-modelo="{{ $veiculo->modelo }}"
                            data-placa="{{ $veiculo->placa }}"
                            data-cliente="{{ $veiculo->cliente->cliente ?? '' }}">
                            <i class="fas fa-edit"></i> Editar
                        </button>
                        <button
                            class="btn btn-excluir"
                            data-id="{{ $veiculo->id }}">
                            <i class="fas fa-trash-alt"></i> Excluir
                        </button>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">Nenhum veículo cadastrado.</td>
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
                const modal = new bootstrap.Modal(document.getElementById('editarVeiculoModal'));
                const form = document.getElementById('formEditarVeiculo');

                form.action = `/veiculo/${btn.dataset.id}`;
                document.getElementById('editarMarca').value = btn.dataset.marca;
                document.getElementById('editarModelo').value = btn.dataset.modelo;
                document.getElementById('editarPlaca').value = btn.dataset.placa;
                document.getElementById('editarCliente').value = btn.dataset.cliente;
                modal.show();
            });
        });


        // Excluir
        document.querySelectorAll('.btn-excluir').forEach(btn => {
            btn.addEventListener('click', () => {
                const modal = new bootstrap.Modal(document.getElementById('modalConfirmacao'));
                document.getElementById('formExcluir').action = `/veiculo/${btn.dataset.id}`;
                modal.show();
            });
        });
    });
</script>

@include('veiculo.excluir_veiculo')
@include('veiculo.editar_veiculo')
@include('veiculo.criar_veiculo')
@endsection