@extends('layout')

@section('conteudo')

<div class="mb-3">
    <h1 class="text-center">Estoque</h1>
</div>

<div class="mb-3">
    <button class="btn btn-success">Novo Produto</button>
</div>

<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nome do Item</th>
                <th>Quantidade</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Produto A</td>
                <td>10</td>
                <td class="text-center">
                    <div class="d-flex justify-content-center gap-2">
                        <button class="btn btn-sm btn-primary w-100">
                            <i class="fas fa-edit"></i> Editar
                        </button>
                        <button class="btn btn-sm btn-danger w-100">
                            <i class="fas fa-trash-alt"></i> Excluir
                        </button>
                    </div>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Produto B</td>
                <td>5</td>
                <td class="text-center">
                    <div class="d-flex justify-content-center gap-2">
                        <button class="btn btn-sm btn-primary w-100">
                            <i class="fas fa-edit"></i> Editar
                        </button>
                        <button class="btn btn-sm btn-link w-100">
                            <i class="fas fa-trash-alt"></i> Excluir
                        </button>
                    </div>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>Produto C</td>
                <td>8</td>
                <td class="text-center">
                    <div class="d-flex justify-content-center gap-2">
                        <button class="btn btn-sm btn-primary w-100">
                            <i class="fas fa-edit"></i> Editar
                        </button>
                        <button class="btn btn-sm btn-danger w-100">
                            <i class="fas fa-trash-alt"></i> Excluir
                        </button>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection