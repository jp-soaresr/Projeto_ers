<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Relatório de Estoque</title>
    <style>
        body { font-family: 'Helvetica', sans-serif; font-size: 11px; color: #333; }
        .header { text-align: center; margin-bottom: 25px; }
        .header h1 { margin: 0; font-size: 22px; color: #79b7b4; }
        .header p { margin: 0; font-size: 13px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 7px; text-align: left; }
        thead { background-color: #79b7b4; color: white; }
        tr:nth-child(even) { background-color: #e0f0ef; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Relatório de Estoque</h1>
        <p>Gerado em: {{ date('d/m/Y H:i:s') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome do Item</th>
                <th>Quantidade</th>
                <th>Valor (R$)</th>
                <th>Categoria</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($produtos as $produto)
                <tr>
                    <td>{{ $produto->id }}</td>
                    <td>{{ $produto->produto }}</td>
                    <td>{{ $produto->estoque }}</td>
                    <td>R$ {{ number_format($produto->valor, 2, ',', '.') }}</td>
                    <td>{{ $produto->categoria->categoria ?? '—' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center;">Nenhum produto em estoque.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>