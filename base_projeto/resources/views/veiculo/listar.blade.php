@extends('layout')

@section('conteudo')

{{-- Lembre-se de ter os links para a fonte e ícones no seu layout principal --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">


<style>
    /* O mesmo CSS que usamos para a tela de Produtos.
       Idealmente, ele deve estar no seu arquivo CSS principal.
    */
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

    /* --- Layout de Lista de Veículos --- */
    .lista-veiculos {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
    }

    .veiculo-card-linha {
        background-color: var(--cor-card);
        border-radius: var(--raio-borda);
        border: 1px solid var(--cor-borda);
        box-shadow: var(--sombra-suave);
        padding: 1rem 1.5rem;
        display: grid;
        grid-template-columns: 2.5fr 1.5fr 2fr 1.5fr; /* Proporções: Marca/Modelo, Placa, Cliente, Ações */
        align-items: center;
        gap: 1rem;
        transition: all 0.2s ease-in-out;
    }
    .veiculo-card-linha:hover {
        transform: translateY(-3px) scale(1.01);
        box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
        border-color: var(--cor-primaria);
    }
    
    .veiculo-info {
        display: flex;
        align-items: center;
        gap: 1rem;
    }
    
    .veiculo-avatar {
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

    .veiculo-nome {
        font-weight: 600;
        color: var(--cor-texto-titulo);
    }
    .veiculo-subtitulo {
        font-size: 0.85rem;
        color: var(--cor-texto-suave);
    }

    .veiculo-dado {
        font-weight: 500;
        color: var(--cor-texto-corpo);
    }

    .veiculo-placa {
        background-color: #e5e7eb;
        color: #1f2937;
        padding: 0.25rem 0.75rem;
        border-radius: 6px;
        font-weight: 700;
        font-family: monospace;
        letter-spacing: 1px;
        border: 1px solid #d1d5db;
        display: inline-block;
    }

    .veiculo-acoes {
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
        .veiculo-card-linha {
            grid-template-columns: 1fr;
            padding: 1.5rem;
        }
        .veiculo-acoes {
            justify-content: flex-start;
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 1px solid var(--cor-borda);
        }
    }

</style>

<div class="container mt-4">

    <div class="header-acoes mb-4">
        <h2>Veículos</h2>
        <div>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#novoVeiculoModal">
                <i class="fas fa-plus me-1"></i> Novo Veículo
            </button>
        </div>
    </div>
    
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="lista-veiculos">
        @forelse ($veiculos as $veiculo)
            <div class="veiculo-card-linha">
                
                {{-- Coluna 1: Marca e Modelo --}}
                <div class="veiculo-info">
                    <div class="veiculo-avatar">
                        <i class="fas fa-car"></i>
                    </div>
                    <div>
                        <div class="veiculo-nome">{{ $veiculo->marca }}</div>
                        <div class="veiculo-subtitulo">{{ $veiculo->modelo }}</div>
                    </div>
                </div>

                {{-- Coluna 2: Placa --}}
                <div class="veiculo-dado">
                    <span class="veiculo-placa">{{ $veiculo->placa }}</span>
                </div>

                {{-- Coluna 3: Cliente --}}
                <div class="veiculo-dado">
                    {{ $veiculo->cliente->nome ?? '—' }}
                </div>

                {{-- Coluna 4: Ações --}}
                <div class="veiculo-acoes">
                    <button
                        class="btn-acao-card editar btn-editar"
                        title="Editar Veículo"
                        data-id="{{ $veiculo->id }}"
                        data-marca="{{ $veiculo->marca }}"
                        data-modelo="{{ $veiculo->modelo }}"
                        data-placa="{{ $veiculo->placa }}"
                        data-cliente="{{ $veiculo->cliente_id ?? '' }}">
                        <i class="fas fa-pencil-alt"></i>
                    </button>
                    <button
                        class="btn-acao-card excluir btn-excluir"
                        title="Excluir Veículo"
                        data-id="{{ $veiculo->id }}">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </div>

            </div>
        @empty
            <div class="text-center p-5 bg-light rounded-3">
                <p class="mb-0">Nenhum veículo cadastrado.</p>
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

@include('veiculo.excluir')
@include('veiculo.editar')
@include('veiculo.criar')
@endsection