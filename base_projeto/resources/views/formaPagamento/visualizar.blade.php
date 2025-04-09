@extends('layout')

@section('conteudo')
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Formas de pagamento</h2>
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#criarFormaPagamentoModal">
            Nova forma de pagamento
        </button>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>Nome da forma de pagamento</th>
                <th class="text-center" style="width: 160px;">Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($forma_pagamentos as $forma_pagamento)
                <tr>
                    <td>{{ $forma_pagamento->forma_pagamento }}</td>
                    <td class="text-center">
                        <button class="btn btn-primary btn-sm btn-editar-categoria"
                            data-id="{{ $forma_pagamento->id }}"
                            data-nome="{{ $forma_pagamento->forma_pagamento }}">
                            Editar
                        </button>
                        <button class="btn btn-danger btn-sm btn-excluir-categoria"
                            data-id="{{ $forma_pagamento->id }}">
                            Excluir
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">Nenhuma forma de pagamento cadastrada.</td>
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
                const modal = new bootstrap.Modal(document.getElementById('editarFormaPagamentoModal'));
                const form = document.getElementById('formEditarFormaPagamento');

                form.action = `/forma_pagamentos/${botao.dataset.id}`;
                document.getElementById('editarNomeFormaPagamento').value = botao.dataset.nome;

                modal.show();
            });
        });

        // Excluir categoria
        document.querySelectorAll('.btn-excluir-categoria').forEach(botao => {
            botao.addEventListener('click', () => {
                const modal = new bootstrap.Modal(document.getElementById('ExcluirFormaPagamentoModal'));
                const form = document.getElementById('formExcluirFormaPagamento');

                form.action = `/forma_pagamentos/${botao.dataset.id}`;
                modal.show();
            });
        });

    });
</script>

@include('formaPagamento.criar_fp')
@include('formaPagamento.editar_fp')
@include('formaPagamento.excluir_fp')

@endsection



