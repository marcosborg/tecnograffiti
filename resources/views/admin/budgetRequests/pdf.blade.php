<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Extrato</title>
    <style>
        html {
            font-family: sans-serif;
            font-size: 11px;
        }

        table {
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            vertical-align: top;
            text-align: left;
        }

        @page {
            margin-top: 40px;
            margin-bottom: 0;
            margin-left: 40px;
            margin-right: 40px;
        }

        body {
            margin: 0;
        }

        footer {
            position: fixed;
            bottom: -0px;
            left: 0px;
            right: 0px;
            height: 50px;
            line-height: 35px;
        }
    </style>
</head>

<body>


    <table style="width: 100%;">
        <tr>
            <th style="text-align: left;">
                <h1>Pedido de orçamento (PO)</h1>
            </th>
            <th style="width: 30%; vertical-align: middle;">
                <img src="https://tecnograffiti.com/website/img/logo.png" width="200">
            </th>
        </tr>
    </table>
    <table style="width: 100%;">
        <thead>
            <tr>
                <th style="width: 35%; text-align: left;">CLIENTE</th>
                <th style="width: 35%; text-align: left;">
                    @if ($budgetRequest->client->id !== $budgetRequest->billing_client->id)
                    FATURAÇÃO
                    @endif
                </th>
                <th style="width: 30%; text-align: left;">PEDIDO</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <strong>Nome: </strong>{{ $budgetRequest->client->name }}<br>
                    <strong>NIF/ NIPC: </strong>{{ $budgetRequest->client->vat }}<br>
                    <strong>Endereço: </strong>{{ $budgetRequest->client->address }} {{ $budgetRequest->client->location
                    }}
                    {{ $budgetRequest->client->zip }}<br>
                    <strong>Email: </strong>{{ $budgetRequest->client->email }}<br>
                    <strong>Contactos:</strong>{{ $budgetRequest->client->phone_1 ?? ' ' .
                    $budgetRequest->client->phone_1
                    }}{{ $budgetRequest->client->phone_2 ?? ' ' . $budgetRequest->client->phone_2 }}{{
                    $budgetRequest->client->celphone ?? ' ' . $budgetRequest->client->celphone }}
                </td>
                <td>
                    @if ($budgetRequest->client->id !== $budgetRequest->billing_client->id)
                    <strong>Nome: </strong>{{ $budgetRequest->billing_client->name }}<br>
                    <strong>NIF/ NIPC: </strong>{{ $budgetRequest->billing_client->vat }}<br>
                    <strong>Endereço: </strong>{{ $budgetRequest->billing_client->address }} {{
                    $budgetRequest->billing_client->location }}
                    {{ $budgetRequest->billing_client->zip }}<br>
                    <strong>Email: </strong>{{ $budgetRequest->billing_client->email }}<br>
                    <strong>Contactos:</strong>{{ $budgetRequest->billing_client->phone_1 ?? ' ' .
                    $budgetRequest->billing_client->phone_1
                    }}{{ $budgetRequest->billing_client->phone_2 ?? ' ' . $budgetRequest->billing_client->phone_2 }}{{
                    $budgetRequest->billing_client->celphone ?? ' ' . $budgetRequest->billing_client->celphone }}
                    @endif
                </td>
                <td>
                    <strong>Referência </strong>{{ $budgetRequest->reference }}<br>
                    <strong>Data do pedido: </strong>{{ $budgetRequest->request_date }}<br>
                    <strong>Urgência: </strong>{{ $budgetRequest->urgency->name }}<br>
                    <strong>Tipo de cliente: </strong>{{ $budgetRequest->client->client_type->name }}
                </td>
            </tr>
        </tbody>
    </table>
    <table style="width: 100%; border-collapse: separate; border-spacing: 10px;">
        <tr>
            <td style="width: 65%; border: solid 1px;">
                <table style="width: 100%;">
                    <thead>
                        <tr style="border-bottom: solid 1px #ccc; background-color: #eaeaea;">
                            <th>ESTADOS DO PEDIDO</th>
                            <th>Data</th>
                            <th>Modo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>PEDIDO </strong></td>
                            <td>{{ $budgetRequest->request_date }}</td>
                            <td>{{ $budgetRequest->reception_mode->name }}</td>
                        </tr>
                        @if ($budgetRequest->sent)
                        <tr>
                            <th>ENVIADO / AGUARDA RESPOSTA</th>
                            <td>{{ $budgetRequest->sent_date }}</td>
                            <td></td>
                        </tr>
                        @endif
                        @if ($budgetRequest->adjudicated)
                        <tr>
                            <th>ADJUDICADO</th>
                            <td>{{ $budgetRequest->adjudicated_date }}</td>
                            <td></td>
                        </tr>
                        @endif
                        @if ($budgetRequest->concluded)
                        <tr>
                            <th>CONCLUIDO</th>
                            <td>{{ $budgetRequest->concluded_date }}</td>
                            <td></td>
                        </tr>
                        @endif
                        @if ($budgetRequest->invoice)
                        <tr>
                            <th>FATURA N.º</th>
                            <td>{{ $budgetRequest->invoice_date }}</td>
                            <td></td>
                        </tr>
                        @endif
                        @if ($budgetRequest->survey)
                        <tr>
                            <th>INQUÉRITO DE OPINIÃO</th>
                            <td>{{ $budgetRequest->survey_date }}</td>
                            <td></td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </td>
            <td style="width: 35%; border: solid 1px;">
                <table style="width: 100%;">
                    <tbody>
                        <tr style="border-bottom: solid 1px #ccc; background-color: #eaeaea;">
                            <th>SERVIÇOS</th>
                        </tr>
                        @if ($budgetRequest->work_data_1)
                        <tr>
                            <td>PSRG – Remoção de Graffiti</td>
                        </tr>
                        @endif
                        @if ($budgetRequest->work_data_2)
                        <tr>
                            <td>PSPAG – Aplicação de Anti-Graffiti</td>
                        </tr>
                        @endif
                        @if ($budgetRequest->work_data_3)
                        <tr>
                            <td>PSRAV – Remoção de Graffiti em Ácido</td>
                        </tr>
                        @endif
                        @if ($budgetRequest->work_data_4)
                        <tr>
                            <td>PSRP – Repintura de Fachada</td>
                        </tr>
                        @endif
                        @if ($budgetRequest->work_data_5)
                        <tr>
                            <td>PSPP – Repintura de Portas e Portões</td>
                        </tr>
                        @endif
                        @if ($budgetRequest->work_data_6)
                        <tr>
                            <td>PSLCAN – Limpeza de Fachada e Cantarias</td>
                        </tr>
                        @endif
                        @if ($budgetRequest->work_data_7)
                        <tr>
                            <td>PSMAN – Serviços de Manutenção</td>
                        </tr>
                        @endif
                        @if ($budgetRequest->work_data_8)
                        <tr>
                            <td>PSOSL – Outros Serviços de Limpeza</td>
                        </tr>
                        @endif
                        @if ($budgetRequest->work_data_9)
                        <tr>
                            <td>Fornecimento Produtos</td>
                        </tr>
                        @endif
                        <tr style="border-bottom: solid 1px #ccc; background-color: #eaeaea;">
                            <th>TIPOS DE SUPERFÍCIE</th>
                        </tr>
                        @foreach ($budgetRequest->surface_types as $surface_type)
                        <tr>
                            <td>{{ $surface_type->name }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </td>
        </tr>
    </table>
    <p><strong>FOTOGRAFIAS</strong></p>
    <table style="width: 100%">
        <tr>
            @foreach ($budgetRequest->photos as $photo)
            <td>
                <img src="{{ $photo->getUrl() }}" style="width: 100%; max-width: 200px;">
            </td>
            @endforeach
        </tr>
    </table>
    <table style="width: 100%;">
        <tr>
            <td style="width: 50%;">
                <table style="width: 100%;">
                    <tr>
                        <td>
                            <strong>Morada do Local (Para prestação do serviço)</strong><br>
                            {{ $budgetRequest->address }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Outras Referências de Localização</strong><br>
                            {{ $budgetRequest->location_info }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>N/ Conhecimento através de</strong><br>
                            {{ $budgetRequest->info->name }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Outras observações</strong><br>
                            {{ $budgetRequest->obs }}
                        </td>
                    </tr>
                </table>
            </td>
            <td style="width: 50%;">
                <table style="width: 100%;">
                    <tr>
                        <td>
                            <strong>Horas previstas</strong><br>
                            {{ $budgetRequest->duration_hours }} hora{{ $budgetRequest->duration_hours > 1 && $budgetRequest->duration_hours != 0 ? 's' : '' }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Dias previstos</strong><br>
                            {{ $budgetRequest->duration_days }} dia{{ $budgetRequest->duration_days > 1 && $budgetRequest->duration_days != 0 ? 's' : '' }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Sábados previstos</strong><br>
                            {{ $budgetRequest->duration_saturdays }} sábado{{ $budgetRequest->duration_saturdays > 1 && $budgetRequest->duration_saturdays != 0 ? 's' : '' }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Noites previstas</strong><br>
                            {{ $budgetRequest->duration_nights }} noite{{ $budgetRequest->duration_nights > 1 && $budgetRequest->duration_nights != 0 ? 's' : '' }}
                        </td>
                    </tr>
                </table>                
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td>
                <strong>Observações</strong><br>
                {!! $budgetRequest->other_information !!}
            </td>
        </tr>
    </table>
    <footer>
        Tecnograffiti - PO © Rua Bartolomeu Dias 15 A/B, Edifício EDIPAD - Armazém C1 - 2695-718 São João da
        Talha tecnograffiti@tecnograffiti.com +351 21 301 31 04
        <?php echo date("Y");?>
    </footer>
</body>