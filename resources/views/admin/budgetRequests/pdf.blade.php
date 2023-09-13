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
            <th style="width: 30%;">
                <img src="https://tecnograffiti.com/website/img/logo.png" width="200">
            </th>
        </tr>
    </table>
    <table style="width: 100%;">
        <thead>
            <tr>
                <th style="width: 35%; text-align: left;">CLIENTE</th>
                <th style="width: 35%; text-align: left;">FATURAÇÃO</th>
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
                </td>
                <td>
                    <strong>Data do pedido: </strong>{{ $budgetRequest->request_date }}
                </td>
            </tr>
        </tbody>
    </table>
    <footer>
        Tecnograffiti - PO © Rua Bartolomeu Dias 15 A/B, Edifício EDIPAD - Armazém C1 - 2695-718 São João da
        Talha tecnograffiti@tecnograffiti.com +351 21 301 31 04
        <?php echo date("Y");?>
    </footer>
</body>
<script>console.log({!! $budgetRequest !!})</script>