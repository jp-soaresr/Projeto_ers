@extends('layout')

@section('conteudo')
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Clientes</h2>
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#novoClienteModal">
            Novo Cliente
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
                <th>Endereço</th>
                <th>CPF/CNPJ</th>
                <th class="text-center" style="width: 160px;">Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->nome }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td>{{ $cliente->telefone }}</td>
                    <td>{{ $cliente->endereco }}</td>
                    <td>{{ $cliente->cpf_cnpj }}</td>

                    <td class="text-center">
                        <button class="btn btn-primary btn-sm btn-editar-cliente"
                            data-id="{{ $cliente->id }}"
                            data-nome="{{ $cliente->nome }}"
                            data-email="{{ $cliente->email }}"
                            data-telefone="{{ $cliente->telefone }}"
                            data-endereco="{{ $cliente->endereco }}"
                            data-cpf_cnpj="{{ $cliente->cpf_cnpj }}">
                            Editar
                        </button>
                        <button class="btn btn-danger btn-sm btn-excluir-cliente"
                            data-id="{{ $cliente->id }}">
                            Excluir
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Nenhum cliente cadastrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Botões de edição
    document.querySelectorAll('.btn-editar-cliente').forEach(function(botao) {
        botao.addEventListener('click', function() {
            const modal = new bootstrap.Modal(document.getElementById('editarClienteModal'));
            const form = document.getElementById('formEditarCliente');
            form.action = `/clientes/${botao.dataset.id}`;
            document.getElementById('editarNomeCliente').value = botao.dataset.nome;
            document.getElementById('editarEmailCliente').value = botao.dataset.email;
            document.getElementById('editarTelefoneCliente').value = botao.dataset.telefone;
            document.getElementById('editarEnderecoCliente').value = botao.dataset.endereco;
            document.getElementById('editarCpfCnpjCliente').value = botao.dataset.cpf_cnpj;

            modal.show();
        });
    });

    // Botões de exclusão
    document.querySelectorAll('.btn-excluir-cliente').forEach(function(botao) {
        botao.addEventListener('click', function() {
            const modal = new bootstrap.Modal(document.getElementById('modalConfirmarExcluirCliente'));
            document.getElementById('formExcluirCliente').action = `/clientes/${botao.dataset.id}`;
            modal.show();
        });
    });
});
</script>

@include('clientes.novoCliente')
@include('clientes.editarCliente')
@include('clientes.confirmarExcluir')
@endsection
