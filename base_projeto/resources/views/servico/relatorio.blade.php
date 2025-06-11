<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Relatório Geral de Serviços</title>
    {{-- O CSS é idêntico ao do relatório de estoque para manter o mesmo visual --}}
    <style>
        body { font-family: 'Helvetica', sans-serif; font-size: 11px; color: #333; }
        .header { text-align: center; margin-bottom: 25px; }
        .header h1 { margin: 0; font-size: 22px; color: #79b7b4; }
        .header p { margin: 0; font-size: 13px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 7px; text-align: left; }
        thead { background-color: #79b7b4; color: white; }
        tr:nth-child(even) { background-color: #e0f0ef; }
        .valor { text-align: right; }
        .status { text-transform: capitalize; }
    </style>
</head>
<body>
    <div class="header">
        {{-- TÍTULO ATUALIZADO --}}
        <h1>Relatório Geral de Serviços</h1>
        <p>Gerado em: {{ date('d/m/Y H:i:s') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                {{-- COLUNAS ATUALIZADAS PARA SERVIÇOS --}}
                <th>ID</th>
                <th>Serviço</th>
                <th>Cliente</th>
                <th>Data Início</th>
                <th>Status</th>
                <th class="valor">Valor (R$)</th>
            </tr>
        </thead>
        <tbody>
            {{-- LOOP ATUALIZADO PARA A VARIÁVEL $servicos --}}
            @forelse ($servicos as $servico)
                <tr>
                    <td>{{ $servico->id }}</td>
                    <td>{{ $servico->nome }}</td>
                    <td>{{ $servico->cliente->nome ?? '—' }}</td>
                    <td>{{ \Carbon\Carbon::parse($servico->data_inicio)->format('d/m/Y') }}</td>
                    <td class="status">{{ $servico->status ?? '—' }}</td>
                    <td class="valor">R$ {{ number_format($servico->valor, 2, ',', '.') }}</td>
                </tr>
            @empty
                <tr>
                    {{-- Colspan ajustado para o novo número de colunas --}}
                    <td colspan="6" style="text-align: center;">Nenhum serviço encontrado para este relatório.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>