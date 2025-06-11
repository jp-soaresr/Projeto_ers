<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Boleto de Cobrança - Serviço #{{ $servico->id }}</title>
    <style>
        /* AJUSTES PARA CABER NA PÁGINA */
        @page {
            /* Define as margens da página A4 */
            margin: 1.5cm; 
        }

        body { 
            /* Remove qualquer margem padrão do corpo do documento */
            margin: 0; 
            font-family: 'Helvetica', Arial, sans-serif; 
            font-size: 10px; 
            color: #000; 
        }

        * {
            /* Garante que padding e borda não aumentem o tamanho dos elementos */
            box-sizing: border-box;
        }
        /* FIM DOS AJUSTES */
        
        table { width: 100%; border-collapse: collapse; }
        td { padding: 4px 6px; border: 1px solid #000; vertical-align: top; }
        .no-border { border: none; }
        .label { display: block; font-size: 8px; color: #333; margin-bottom: 2px; }
        .value { font-size: 11px; font-weight: bold; }
        .logo-banco { font-size: 16px; font-weight: bold; padding-right: 15px; border-right: 2px solid #000; }
        .codigo-banco { font-size: 16px; font-weight: bold; padding-left: 15px; }
        .recibo-pagador { font-size: 12px; font-weight: bold; text-align: right; }
        .instrucoes { font-size: 9px; line-height: 1.4; }
        .text-right { text-align: right; }
        .valor-documento { font-size: 12px; font-weight: bold; }
        .corte { border-top: 1px dashed #000; padding: 5px 0; text-align: right; font-size: 8px; }
    </style>
</head>
<body>

    <table style="margin-bottom: 15px;">
        <tr>
            <td class="logo-banco" style="border:none; border-right: 2px solid #000;">Oficina Delta</td>
            <td class="codigo-banco" style="border:none;">001-9</td>
            <td class="recibo-pagador" style="border:none;">Recibo do Sacado</td>
        </tr>
    </table>

    <table>
        <tr>
            <td colspan="4">
                <div class="label">Local de Pagamento</div>
                <div class="value">PAGÁVEL EM QUALQUER BANCO ATÉ O VENCIMENTO</div>
            </td>
            <td style="width: 25%;"> {{-- LARGURA AJUSTADA PARA SER PROPORCIONAL --}}
                <div class="label">Vencimento</div>
                <div class="value text-right">{{ \Carbon\Carbon::parse($servico->data_fim)->format('d/m/Y') }}</div>
            </td>
        </tr>

        <tr>
            <td colspan="4">
                <div class="label">Beneficiário</div>
                <div class="value">Oficina Delta</div>
            </td>
            <td>
                <div class="label">Agência/Código do Beneficiário</div>
                <div class="value text-right">—</div>
            </td>
        </tr>

        <tr>
            <td> {{-- LARGURAS FIXAS REMOVIDAS --}}
                <div class="label">Data do Documento</div>
                <div class="value">{{ $servico->created_at->format('d/m/Y') }}</div>
            </td>
            <td>
                <div class="label">Nº do Documento</div>
                <div class="value">{{ str_pad($servico->id, 8, '0', STR_PAD_LEFT) }}</div>
            </td>
            <td>
                <div class="label">Espécie DOC.</div>
                <div class="value">DM</div>
            </td>
            <td>
                <div class="label">Aceite</div>
                <div class="value">N</div>
            </td>
            <td>
                <div class="label">Data Processamento</div>
                <div class="value">{{ date('d/m/Y') }}</div>
            </td>
        </tr>
        
        <tr>
            <td>
                <div class="label">Uso do Banco</div>
                <div class="value">&nbsp;</div>
            </td>
            <td>
                <div class="label">Carteira</div>
                <div class="value">17</div>
            </td>
            <td>
                <div class="label">Espécie</div>
                <div class="value">R$</div>
            </td>
            <td>
                <div class="label">Quantidade</div>
                <div class="value">1</div>
            </td>
            <td>
                <div class="label">Nosso Número</div>
                <div class="value text-right">—</div>
            </td>
        </tr>

        <tr>
            <td colspan="4" rowspan="7" class="instrucoes">
                <div class="label">Instruções (Texto de responsabilidade do beneficiário)</div>
                <p>
                    Referente ao serviço: <strong>{{ $servico->nome }}</strong><br>
                    Cliente: <strong>{{ $servico->cliente->nome ?? 'Não informado' }}</strong><br><br>
                    
                    NÃO ACEITAMOS DEPÓSITO EM CONTA<br>
                    PROTESTO EM 10 DIAS CORRIDOS APÓS O VENCIMENTO<br><br>
                    
                    <strong>PAGAMENTO ATÉ {{ \Carbon\Carbon::parse($servico->data_fim)->format('d/m/Y') }}</strong>
                </p>
            </td>
            <td>
                <div class="label">(=) Valor do Documento</div>
                <div class="valor-documento text-right">R$ {{ number_format($servico->valor, 2, ',', '.') }}</div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="label">(-) Desconto / Abatimento</div>
                <div class="value text-right">&nbsp;</div>
            </td>
        </tr>
         <tr>
            <td>
                <div class="label">(-) Outras Deduções</div>
                <div class="value text-right">&nbsp;</div>
            </td>
        </tr>
         <tr>
            <td>
                <div class="label">(+) Mora / Multa</div>
                <div class="value text-right">&nbsp;</div>
            </td>
        </tr>
         <tr>
            <td>
                <div class="label">(+) Outros Acréscimos</div>
                <div class="value text-right">&nbsp;</div>
            </td>
        </tr>
         <tr>
            <td>
                <div class="label">(=) Valor Cobrado</div>
                <div class="value text-right">&nbsp;</div>
            </td>
        </tr>
    </table>
    
    <table>
        <tr>
            <td class="no-border" colspan="5">
                <div class="label">Sacado</div>
                <div class="value" style="margin-left: 20px;">
                    {{ $servico->cliente->nome ?? 'Não informado' }}<br>
                    {{-- Adicione o endereço do cliente aqui se tiver --}}
                </div>
            </td>
        </tr>
        <tr>
             <td class="no-border corte" colspan="5">Autenticação Mecânica - Ficha de Compensação</td>
        </tr>
    </table>
</body>
</html>