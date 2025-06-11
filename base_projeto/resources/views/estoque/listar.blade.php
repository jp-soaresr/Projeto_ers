@extends('layout')

@section('conteudo')

{{-- Lembre-se de ter os links para a fonte e ícones no seu layout principal --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">


<style>
    /* O CSS do nosso "Mini Sistema de Design" */
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
        --sombra-suave: 0 4px 6px -1px rgb(0 0 0 / 0.07), 0 2px 4px -2px rgb(0 0 0 / 0.07);
        --raio-borda: 16px;
    }

    body {
        background-color: var(--cor-fundo);
        font-family: 'Inter', sans-serif;
    }

    /* Cabeçalho padronizado */
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

    /* --- Novo Layout de Lista de Produtos --- */
    .lista-produtos {
        display: flex;
        flex-direction: column;
        gap: 0.75rem; /* Espaço entre os cards */
    }

    .produto-card-linha {
        background-color: var(--cor-card);
        border-radius: var(--raio-borda);
        border: 1px solid var(--cor-borda);
        box-shadow: var(--sombra-suave);
        padding: 1rem 1.5rem;
        display: grid; /* Usando grid para alinhar as colunas */
        grid-template-columns: 2.5fr 1fr 1fr 1fr 1.5fr; /* Proporções das colunas */
        align-items: center;
        gap: 1rem;
        transition: all 0.2s ease-in-out;
    }
    .produto-card-linha:hover {
        transform: translateY(-3px) scale(1.01);
        box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
        border-color: var(--cor-primaria);
    }
    
    .produto-info {
        display: flex;
        align-items: center;
        gap: 1rem;
    }
    
    .produto-avatar {
        width: 48px;
        height: 48px;
        flex-shrink: 0;
        background-color: var(--cor-primaria-leve, #e0e7ff);
        color: var(--cor-primaria);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }

    .produto-nome {
        font-weight: 600;
        color: var(--cor-texto-titulo);
    }
    .produto-categoria-label {
        font-size: 0.8rem;
        color: var(--cor-texto-suave);
    }

    .produto-dado {
        font-weight: 500;
        color: var(--cor-texto-corpo);
    }

    .produto-acoes {
        display: flex;
        justify-content: flex-end;
        gap: 0.5rem;
    }

    .btn-acao-card {
        background: none; border: 1px solid var(--cor-borda); color: var(--cor-texto-suave);
        font-size: 0.9rem; padding: 0.5rem; border-radius: 8px;
        width: 38px; height: 38px; line-height: 1;
        transition: all 0.2s;
    }
    .btn-acao-card.editar:hover { border-color: #4338ca; background-color: #e0e7ff; color: #4338ca; }
    .btn-acao-card.excluir:hover { border-color: #dc2626; background-color: #fee2e2; color: #dc2626; }

    /* Responsividade */
    @media (max-width: 992px) {
        .produto-card-linha {
            grid-template-columns: 1fr; /* Empilha tudo em telas menores */
            padding: 1.5rem;
        }
        .produto-acoes {
            justify-content: flex-start;
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 1px solid var(--cor-borda);
        }
    }

</style>

<div class="container mt-4">

    <div class="header-acoes mb-4">
        <h2>Produtos</h2>
        <div>
            <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#novoProdutoModal">
                <i class="fas fa-plus me-1"></i> Novo Produto
            </button>
            <a href="{{ route('estoque.relatorio') }}" class="btn btn-outline-secondary">
                <i class="fas fa-file-alt me-1"></i> Gerar Relatório
            </a>
        </div>
    </div>
    
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- A nova lista de produtos começa aqui --}}
    <div class="lista-produtos">
        @forelse ($produtos as $produto)
            <div class="produto-card-linha">
                
                {{-- Coluna 1: Nome e Categoria --}}
                <div class="produto-info">
                    <div class="produto-avatar">
                        <i class="fas fa-box"></i>
                    </div>
                    <div>
                        <div class="produto-nome">{{ $produto->produto }}</div>
                        <div class="produto-categoria-label">{{ $produto->categoria->categoria ?? 'Sem Categoria' }}</div>
                    </div>
                </div>

                {{-- Coluna 2: Quantidade --}}
                <div class="produto-dado">
                    <strong>{{ $produto->estoque }}</strong> Un.
                </div>

                {{-- Coluna 3: Valor --}}
                <div class="produto-dado">
                    R$ {{ number_format($produto->valor, 2, ',', '.') }}
                </div>

                {{-- Coluna 4: Categoria (repetido, pode ser ID ou outra info) --}}
                <div class="produto-dado text-muted">
                    ID: {{ $produto->id }}
                </div>

                {{-- Coluna 5: Ações --}}
                <div class="produto-acoes">
                    <button
                        class="btn-acao-card editar btn-editar"
                        title="Editar Produto"
                        data-id="{{ $produto->id }}"
                        data-nome="{{ $produto->produto }}"
                        data-estoque="{{ $produto->estoque }}"
                        data-valor="{{ $produto->valor }}"
                        data-categoria="{{ $produto->categoria_id ?? '' }}">
                        <i class="fas fa-pencil-alt"></i>
                    </button>
                    <button
                        class="btn-acao-card excluir btn-excluir"
                        title="Excluir Produto"
                        data-id="{{ $produto->id }}">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </div>

            </div>
        @empty
            <div class="text-center p-5 bg-light rounded-3">
                <p class="mb-0">Nenhum produto cadastrado.</p>
            </div>
        @endforelse
    </div>

</div>

{{-- SEU SCRIPT ORIGINAL MANTIDO 100% INTACTO E FUNCIONAL --}}
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
                // Assumindo que o ID do seu select de categoria é 'editarCategoria'
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