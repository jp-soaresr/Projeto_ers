@extends('layout')

@section('conteudo')

{{-- Importando uma fonte profissional e ícones --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">


<style>
    :root {
        --cor-primaria: #4f46e5;
        --cor-sucesso: #10b981;
        --cor-alerta: #f59e0b;
        --cor-perigo: #ef4444;
        --cor-fundo: #f8f9fa;
        --cor-card: #ffffff;
        --cor-texto-principal: #1f2937;
        --cor-texto-secundario: #6b7280;
        --cor-borda: #e5e7eb;
        --sombra-suave: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
    }

    body {
        background-color: var(--cor-fundo);
        font-family: 'Poppins', sans-serif;
    }

    .container.mt-4 {
        max-width: 1200px;
    }

    .header-acoes {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1rem;
        border-bottom: 2px solid var(--cor-borda);
        padding-bottom: 1.5rem;
    }

    .header-acoes h1 {
        color: var(--cor-texto-principal);
        font-weight: 700;
        margin: 0;
    }

    /* --- O Novo Card de Serviço --- */
    .servico-card {
        background-color: var(--cor-card);
        border-radius: 16px;
        border: 1px solid var(--cor-borda);
        box-shadow: var(--sombra-suave);
        display: flex;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        overflow: hidden;
    }

    .servico-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
    }

    .card-conteudo-principal {
        flex-grow: 1;
        padding: 1.5rem;
        display: flex;
        flex-direction: column;
    }

    .card-header-servico {
        display: flex;
        align-items: center;
        /* Alinha o título e o status verticalmente */
        gap: 1rem;
        /* Espaço entre o título e o status */
        margin-bottom: 1.5rem;
    }

    .card-titulo {
        font-size: 1.4rem;
        font-weight: 600;
        color: var(--cor-texto-principal);
        margin: 0;
    }

    .status-badge {
        font-size: 0.75rem;
        font-weight: 600;
        padding: 0.25rem 0.75rem;
        border-radius: 999px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        flex-shrink: 0;
        /* Impede que o badge encolha */
    }

    .status-concluido {
        background-color: #dcfce7;
        color: #166534;
    }

    .status-em_andamento {
        background-color: #dbeafe;
        color: #1e40af;
    }

    .status-pendente {
        background-color: #fef3c7;
        color: #92400e;
    }

    /* LAYOUT AJUSTADO: Grid com 4 colunas para espaçamento igual */
    .info-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1rem 1.5rem;
        /* Espaço vertical e horizontal */
        margin-bottom: 1.5rem;
    }

    .info-bloco {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .info-bloco .icon {
        font-size: 1.1rem;
        color: var(--cor-primaria);
        width: 24px;
        text-align: center;
    }

    .info-label {
        font-size: 0.8rem;
        color: var(--cor-texto-secundario);
    }

    .info-valor {
        font-size: 0.95rem;
        font-weight: 500;
        color: var(--cor-texto-principal);
    }

    .card-footer-servico {
        margin-top: auto;
        padding-top: 1.25rem;
        border-top: 1px solid var(--cor-borda);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .valor-total-bloco .info-label {
        font-size: 0.9rem;
    }

    .valor-total-bloco .valor-total {
        font-size: 1.75rem;
        font-weight: 700;
        color: var(--cor-sucesso);
    }

    .card-acoes-laterais {
        background-color: #f9fafb;
        display: flex;
        flex-direction: column;
        justify-content: center;
        gap: 0.75rem;
        padding: 0 1rem;
        border-left: 1px solid var(--cor-borda);
    }

    .btn-acao-lateral {
        background: none;
        border: none;
        color: var(--cor-texto-secundario);
        font-size: 1.25rem;
        padding: 0.5rem;
        border-radius: 8px;
        width: 40px;
        height: 40px;
        transition: color 0.2s, background-color 0.2s;
    }

    .btn-acao-lateral.editar:hover {
        background-color: #dbeafe;
        color: #1e40af;
    }

    .btn-acao-lateral.excluir:hover {
        background-color: #fee2e2;
        color: #991b1b;
    }

    /* Responsividade para telas menores */
    @media (max-width: 992px) {
        .info-grid {
            grid-template-columns: repeat(2, 1fr);
            /* 2 colunas em telas médias */
        }
    }

    @media (max-width: 576px) {
        .info-grid {
            grid-template-columns: 1fr;
            /* 1 coluna em telas pequenas */
        }

        .card-header-servico {
            flex-direction: column;
            align-items: flex-start;
        }
    }
</style>

<div class="container mt-4">

    <div class="header-acoes mb-5">
        <h1>Meus Serviços</h1>
        <div>
            <a href="{{ route('servicos.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-1"></i> Novo Serviço
            </a>
            <a href="{{ route('relatorio') }}" class="btn btn-outline-secondary" target="_blank">
                <i class="fas fa-file-pdf me-1"></i> Relatório Geral
            </a>
        </div>
    </div>

    <div class="row">
        @foreach($servicos as $servico)
        <div class="col-12 mb-4">

            <div class="servico-card">

                {{-- Conteúdo Principal (Esquerda) --}}
                <div class="card-conteudo-principal">

                    <div class="card-header-servico">
                        <h2 class="card-titulo">{{ $servico->nome }}</h2>
                        <span class="status-badge status-{{ $servico->status ?? 'pendente' }}">{{ $servico->status ?? 'Pendente' }}</span>
                    </div>

                    <div class="info-grid">
                        <div class="info-bloco">
                            <i class="fas fa-user icon"></i>
                            <div>
                                <span class="info-label">Cliente</span>
                                <p class="info-valor mb-0">{{ $servico->cliente->nome ?? '—' }}</p>
                            </div>
                        </div>
                        <div class="info-bloco">
                            <i class="fas fa-credit-card icon"></i>
                            <div>
                                <span class="info-label">Pagamento</span>
                                <p class="info-valor mb-0">{{ $servico->formaPagamento->forma_pagamento ?? '—' }}</p>
                            </div>
                        </div>
                        <div class="info-bloco">
                            <i class="fas fa-calendar-alt icon"></i>
                            <div>
                                <span class="info-label">Início</span>
                                <p class="info-valor mb-0">{{ \Carbon\Carbon::parse($servico->data_inicio)->format('d/m/Y') }}</p>
                            </div>
                        </div>
                        <div class="info-bloco">
                            <i class="fas fa-calendar-check icon"></i>
                            <div>
                                <span class="info-label">Término</span>
                                <p class="info-valor mb-0">{{ \Carbon\Carbon::parse($servico->data_fim)->format('d/m/Y') }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer-servico">
                        <div class="valor-total-bloco">
                            <span class="info-label">Valor Total</span>
                            <p class="valor-total mb-0">R$ {{ number_format($servico->valor, 2, ',', '.') }}</p>
                        </div>

                        <a href="{{ route('servicos.notaFiscal', $servico->id) }}" class="btn btn-dark">
                            <i class="fas fa-receipt me-1"></i> Gerar Nota
                        </a>
                    </div>
                </div>

                {{-- Ações Laterais (Direita) --}}
                <div class="card-acoes-laterais">
                    <a href="{{ route('servicos.edit', $servico->id) }}" class="btn-acao-lateral editar" title="Editar Serviço">
                        <i class="fas fa-pencil-alt"></i>
                    </a>

                    <form action="{{ route('servicos.destroy', $servico->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-acao-lateral excluir" title="Excluir Serviço" onclick="return confirm('Tem certeza que deseja excluir este serviço?')">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </div>

            </div>

        </div>
        @endforeach
    </div>
</div>
@endsection