@extends('layout')

@section('conteudo')

{{-- Links para fonte e ícones --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>
    :root {
        --cor-primaria: #4338ca;
        --cor-sucesso: #16a34a;
        --cor-perigo: #dc2626;
        --cor-alerta: #f59e0b;
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

    .kpi-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 1.5rem;
    }
    .kpi-card {
        background-color: var(--cor-card);
        border-radius: var(--raio-borda);
        padding: 1.5rem;
        display: flex;
        align-items: center;
        gap: 1rem;
        border: 1px solid var(--cor-borda);
        box-shadow: var(--sombra-suave);
    }
    .kpi-card .icon {
        font-size: 1.75rem;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }
    .icon-usuarios { background-color: #dbeafe; color: #1e40af; }
    .icon-clientes { background-color: #dcfce7; color: #166534; }
    .icon-servicos { background-color: #fef3c7; color: #92400e; }
    .icon-produtos { background-color: #fee2e2; color: #991b1b; }
    
    .kpi-card .info .value {
        font-size: 2.25rem;
        font-weight: 700;
        color: var(--cor-texto-titulo);
        line-height: 1;
    }
    .kpi-card .info .label {
        font-size: 0.9rem;
        color: var(--cor-texto-suave);
    }
    
    .charts-grid {
        margin-top: 2.5rem;
        display: grid;
        grid-template-columns: 1fr 2fr;
        gap: 1.5rem;
    }
    .chart-card {
        background-color: var(--cor-card);
        border-radius: var(--raio-borda);
        padding: 1.5rem;
        border: 1px solid var(--cor-borda);
        box-shadow: var(--sombra-suave);
        display: flex; /* Adicionado para controle do container interno */
        flex-direction: column; /* Adicionado */
    }
    .chart-card h3 {
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 1.5rem;
        flex-shrink: 0; /* Impede que o título encolha */
    }

    /* ======================================================= */
    /* AJUSTE: Container para quebrar o loop de renderização   */
    /* ======================================================= */
    .chart-container {
        position: relative;
        flex-grow: 1; /* Faz o container crescer e ocupar o espaço */
        min-height: 350px; /* Define uma altura mínima para o gráfico */
    }


    /* Responsividade para os gráficos */
    @media (max-width: 992px) {
        .charts-grid {
            grid-template-columns: 1fr; 
        }
    }
</style>

<div class="container mt-4">
    <h1 class="mb-5">Dashboard</h1>

    {{-- GRID DOS CARDS DE NÚMEROS (KPIs) --}}
    <div class="kpi-grid">
        {{-- Seus cards de KPI aqui... --}}
        <div class="kpi-card">
            <div class="icon icon-usuarios"><i class="fas fa-users"></i></div>
            <div class="info">
                <div class="value">{{ $totalUsuarios }}</div>
                <div class="label">Usuários</div>
            </div>
        </div>
        <div class="kpi-card">
            <div class="icon icon-clientes"><i class="fas fa-handshake"></i></div>
            <div class="info">
                <div class="value">{{ $totalClientes }}</div>
                <div class="label">Clientes</div>
            </div>
        </div>
        <div class="kpi-card">
            <div class="icon icon-servicos"><i class="fas fa-wrench"></i></div>
            <div class="info">
                <div class="value">{{ $totalServicos }}</div>
                <div class="label">Serviços Prestados</div>
            </div>
        </div>
        <div class="kpi-card">
            <div class="icon icon-produtos"><i class="fas fa-box"></i></div>
            <div class="info">
                <div class="value">{{ $totalProdutosEmEstoque }}</div>
                <div class="label">Produtos em Estoque</div>
            </div>
        </div>
    </div>

    {{-- Links e Style block (sem alterações) --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
{{-- ... (resto dos seus links e style block) ... --}}
<style>
    :root {
        --cor-primaria: #4338ca;
        /* etc... */
    }
</style>

<div class="container mt-4">

    {{-- GRID DOS CARDS DE NÚMEROS (KPIs) - Sem alterações --}}
    <div class="kpi-grid">
        {{-- ... Seus 4 cards de KPI ... --}}
    </div>

    {{-- GRID DOS GRÁFICOS --}}
    <div class="charts-grid">
        <div class="chart-card">
            {{-- MUDANÇA 1: Título do gráfico atualizado --}}
            <h3>Formas de Pagamento Mais Usadas</h3>
            <div class="chart-container">
                {{-- O ID do canvas foi renomeado para maior clareza --}}
                <canvas id="graficoPagamentos"></canvas>
            </div>
        </div>
        <div class="chart-card">
            <h3>Serviços por Mês</h3>
            <div class="chart-container">
                <canvas id="graficoServicos"></canvas>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
{{-- Adicionando a biblioteca Chart.js --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    
    // --- GRÁFICO 1: FORMAS DE PAGAMENTO (GRÁFICO DE ROSCA/DONUT) ---
    // MUDANÇA 2: O ID do canvas foi atualizado aqui
    const pagamentosCtx = document.getElementById('graficoPagamentos');
    if (pagamentosCtx) {
        new Chart(pagamentosCtx, {
            type: 'doughnut',
            data: {
                // MUDANÇA 3: Usando as novas variáveis do Controller
                labels: @json($pagamentoLabels),
                datasets: [{
                    label: 'Nº de Vezes Usada',
                    data: @json($pagamentoData),
                    backgroundColor: ['#4f46e5', '#16a34a', '#f59e0b', '#dc2626', '#6b7280'],
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false, 
                plugins: {
                    legend: { position: 'top' }
                }
            }
        });
    }


    // --- GRÁFICO 2: SERVIÇOS POR MÊS (GRÁFICO DE BARRAS) - Nenhuma mudança necessária aqui --
    const servicosCtx = document.getElementById('graficoServicos');
    if (servicosCtx) {
        new Chart(servicosCtx, {
            type: 'bar',
            data: {
                labels: @json($mesesLabels),
                datasets: [{
                    label: 'Total de Serviços',
                    data: @json($servicosPorMesData),
                    backgroundColor: 'rgba(79, 70, 229, 0.8)',
                    borderColor: 'rgba(79, 70, 229, 1)',
                    borderWidth: 1,
                    borderRadius: 5
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false, 
                scales: { y: { beginAtZero: true, ticks: { precision: 0 } } },
                plugins: { legend: { display: false } }
            }
        });
    }
});
</script>
@endpush