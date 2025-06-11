@extends('layout')

@section('conteudo')

{{-- Lembre-se de ter os links para a fonte e ícones no seu layout principal --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">


<style>
    :root {
        --cor-primaria: #4338ca;
        --cor-sucesso: #16a34a;
        --cor-perigo: #dc2626;
        --cor-fundo: #f3f4f6;
        --cor-card: #ffffff;
        --cor-texto-titulo: #111827;
        --cor-texto-corpo: #374151;
        --cor-texto-suave: #6b7280;
        --cor-borda: #e5e7eb;
        --cor-fundo-hover: #f9fafb;
        --sombra-suave: 0 4px 6px -1px rgb(0 0 0 / 0.07), 0 2px 4px -2px rgb(0 0 0 / 0.07);
        --raio-borda: 12px;
    }

    body {
        background-color: var(--cor-fundo);
        font-family: 'Inter', sans-serif;
    }

    .header-acoes {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1rem;
        padding-bottom: 1.5rem;
    }
     .header-acoes h2 {
        color: var(--cor-texto-titulo);
        font-weight: 700;
        margin: 0;
    }

    /* Estilo da Tabela Moderna */
    .table-moderna-wrapper {
        background-color: var(--cor-card);
        border-radius: var(--raio-borda);
        padding: 0.5rem 1rem; /* Padding ajustado */
        box-shadow: var(--sombra-suave);
        border: 1px solid var(--cor-borda);
    }
    .table-moderna {
        border-collapse: collapse; /* MUDANÇA: Para as bordas se unirem */
        width: 100%;
    }
    .table-moderna thead th {
        color: var(--cor-texto-suave);
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border: none;
        border-bottom: 2px solid var(--cor-borda); /* Borda mais forte no cabeçalho */
        padding: 1rem 1.5rem !important;
        text-align: left;
    }
    .table-moderna thead th.text-center {
        text-align: center;
    }

    .table-moderna tbody tr {
        transition: background-color 0.2s ease;
    }
    .table-moderna tbody tr:hover {
        background-color: var(--cor-fundo-hover); /* Efeito de hover mais sutil */
    }
    .table-moderna td {
        border: none;
        padding: 1.25rem 1.5rem !important;
        vertical-align: middle;
        font-weight: 500;
        /* MUDANÇA: Adiciona a divisória horizontal (inferior) */
        border-bottom: 1px solid var(--cor-borda);
    }
    /* MUDANÇA: Remove a borda da última linha para um acabamento limpo */
    .table-moderna tbody tr:last-child td {
        border-bottom: none;
    }

    /* Botões de Ação da Tabela */
    .btn-acao-tabela {
        background: none; border: none; color: var(--cor-texto-suave);
        font-size: 1rem; padding: 0.5rem; border-radius: 8px;
        width: 36px; height: 36px;
        transition: all 0.2s;
    }
    .btn-acao-tabela.editar:hover { background-color: #dbeafe; color: #4338ca; }
    .btn-acao-tabela.excluir:hover { background-color: #fee2e2; color: #dc2626; }

</style>

<div class="container mt-4">

    <div class="header-acoes mb-3">
        <h2>Categorias</h2>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#novaCategoriaModal">
            <i class="fas fa-plus me-1"></i> Nova Categoria
        </button>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-moderna-wrapper">
        <table class="table table-moderna">
            <thead>
                <tr>
                    <th>Nome da Categoria</th>
                    <th class="text-center" style="width: 140px;">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->categoria }}</td>
                        <td class="text-center">
                            <button class="btn-acao-tabela editar btn-editar-categoria"
                                title="Editar Categoria"
                                data-id="{{ $categoria->id }}"
                                data-nome="{{ $categoria->categoria }}">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                            <button class="btn-acao-tabela excluir btn-excluir-categoria"
                                title="Excluir Categoria"
                                data-id="{{ $categoria->id }}">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="text-center" style="padding: 2rem !important; border-bottom: none;">Nenhuma categoria cadastrada.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- SEU SCRIPT ORIGINAL MANTIDO 100% INTACTO --}}
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