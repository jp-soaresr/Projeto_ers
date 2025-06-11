<?php

namespace App\Http\Controllers;

// 1. IMPORTANDO TODOS OS MODELS QUE VAMOS USAR
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Usuario; // CORRIGIDO: Usando seu Model 'Usuario'
use App\Models\Cliente;
use App\Models\Servico;
use App\Models\Produto;
use App\Models\Categoria;

class HomeController extends Controller
{
    public function index()
    {
        // --- DADOS PARA OS CARDS DE NÚMEROS (KPIs) - Sem alteração ---
        $totalUsuarios = \App\Models\Usuario::count();
        $totalClientes = \App\Models\Cliente::count();
        $totalServicos = \App\Models\Servico::count();
        $totalProdutosEmEstoque = \App\Models\Produto::sum('estoque');


        // --- LÓGICA ATUALIZADA PARA O GRÁFICO 1: FORMAS DE PAGAMENTO ---
        // Esta consulta junta 'servicos' com 'forma_pagamentos' e conta quantas vezes cada uma foi usada.
        $pagamentosMaisUsados = \App\Models\Servico::join('forma_pagamentos', 'servicos.id_forma_pagamento', '=', 'forma_pagamentos.id')
            ->select('forma_pagamentos.forma_pagamento as nome', DB::raw('count(servicos.id) as total'))
            ->groupBy('forma_pagamentos.forma_pagamento')
            ->orderBy('total', 'desc')
            ->take(5) // Pega as 5 formas de pagamento mais usadas
            ->get();

        // Prepara os arrays para o JavaScript
        $pagamentoLabels = $pagamentosMaisUsados->pluck('nome');
        $pagamentoData = $pagamentosMaisUsados->pluck('total');


        // --- LÓGICA PARA O GRÁFICO 2: SERVIÇOS POR MÊS - Já está correta e funcional! ---
        $servicosPorMes = \App\Models\Servico::select(
            DB::raw("DATE_FORMAT(data_inicio, '%Y-%m') as mes"),
            DB::raw('count(*) as total')
        )
            ->groupBy('mes')
            ->orderBy('mes', 'asc')
            ->get();

        $mesesLabels = $servicosPorMes->pluck('mes');
        $servicosPorMesData = $servicosPorMes->pluck('total');


        // --- ENVIA OS DADOS CORRETOS PARA A VIEW ---
        // Removemos as variáveis de categoria e adicionamos as de pagamento
        return view('home', compact(
            'totalUsuarios',
            'totalClientes',
            'totalServicos',
            'totalProdutosEmEstoque',
            'mesesLabels',
            'servicosPorMesData',
            'pagamentoLabels',
            'pagamentoData'
        ));
    }
}
