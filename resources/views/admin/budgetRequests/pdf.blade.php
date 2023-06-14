<style>
	body {
		font-family: sans-serif;
		font-size: 12px;
	}

	table.status td {
		border-bottom: 1px solid #ccc;
		padding-bottom: 5px;
		padding-top: 5px;
	}

	table.status th {
		border-bottom: 1px solid #ccc;
		padding-bottom: 5px;
		padding-top: 5px;
	}

	table.status {
		margin-top: 30px;
	}
</style>

<body>

	<table style="width:100%">
		<tbody>
			<tr>
				<td style="width: 30%; vertical-align: top;">
					<img src="/assets/logo.png" alt="">
					<h2>Pedido de Orçamento (PO)</h2>
					<strong>Referência: </strong>{{ $reference }}<br>
					<strong>Cliente: </strong>{{ $client['name'] }}<br>
					<strong>N.º </strong>{{ $client['id'] }}<br>
					<strong>Tipo de cliente: </strong>{{ $client['client_type']['name'] }}
				</td>
				<td style="width: 70%;">
					<table style="width:100%;" class="status">
						<tbody>
							<tr style="text-transform: uppercase;">
								<th style="width: 40%; text-align: left;">Status</th>
								<th style="width: 30%; text-align: left;">Data</th>
								<th style="width: 30%; text-align: left;">Envio/ receção</th>
							</tr>
							@if ($request)
							<tr>
								<th style="text-align: left;">Pedido</th>
								<td>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $request_date)->format('d-m-Y') }}</td>
								<td>{{ $request_mode }}</td>
							</tr>
							@endif
							@if ($sent)
							<tr>
								<th style="text-align: left;">Enviado / Aguarda resposta</th>
								<td>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $sent_date)->format('d-m-Y') }}</td>
								<td>{{ $sent_mode }}</td>
							</tr>
							@endif
							@if ($deadline)
							<tr>
								<th style="text-align: left;">Prazo da resposta (dias úteis)</th>
								<td>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $deadline_date)->format('d-m-Y') }}
								</td>
								<td>{{ $deadline_mode }}</td>
							</tr>
							@endif
							@if ($adjudicated)
							<tr>
								<th style="text-align: left;">Adjudicado</th>
								<td>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $adjudicated_date)->format('d-m-Y') }}
								</td>
								<td>{{ $adjudicated_mode }}</td>
							</tr>
							@endif
							@if ($concluded)
							<tr>
								<th style="text-align: left;">Concluido</th>
								<td>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $concluded_date)->format('d-m-Y') }}
								</td>
								<td>{{ $concluded_mode }}</td>
							</tr>
							@endif
							@if ($invoice)
							<tr>
								<th style="text-align: left;">Fatura n.º</th>
								<td>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $invoice_date)->format('d-m-Y') }}</td>
								<td>{{ $invoice_mode }}</td>
							</tr>
							@endif
							@if ($survey)
							<tr>
								<th style="text-align: left;">Inquerito de opinião</th>
								<td>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $survey_date)->format('d-m-Y') }}</td>
								<td>{{ $survey_mode }}</td>
							</tr>
							@endif
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
	<table style="width: 100%; margin-top: 20px;">
		<tbody>
			<tr>
				<td
					style="width: 50%; border: solid 1px #cccccc; padding: 10px; vertical-align: top; padding-right: 5px;">
					<h3>Trabalhos a executar</h3>
					<ul>
						@if ($work_data_1)
						<li>Remoção de Graffiti</li>
						<ul>
							@if ($work_data_1_1)
							<li>Superfícies (Pedra, azulejo, parede)</li>
							@endif
							@if ($work_data_1_2)
							<li>Superfícies em vidro</li>
							@endif
						</ul>
						@endif
						@if ($work_data_2)
						<li>Proteção Anti-Graffiti</li>
						@endif
						@if ($work_data_3)
						<li>Lavagem de Toldos</li>
						@endif
						@if ($work_data_4)
						<li>Lavagem de Fachadas / Edifícios</li>
						@endif
						@if ($work_data_5)
						<li>Polimento de Vidros</li>
						@endif
						@if ($work_data_6)
						<li>Remoção Calcário em Vidros</li>
						@endif
						@if ($work_data_7)
						<li>Outros Serviços de Limpeza</li>
						@endif
						@if ($work_data_8)
						<li>Manutenção</li>
						@endif
					</ul>
				</td>
				<td style="vertical-align: top; padding-left: 5px;">
					<table style="width: 100%; border: solid 1px #cccccc; padding: 10px;">
						<tbody>
							<tr>
								<td>
									<strong>Cliente (Nome de faturação)</strong><br>
									{{ $client['name'] }}<br>
									<strong>Morada de faturação</strong><br>
									{{ $client['address'] }} {{ $client['zip'] }} {{ $client['location'] }}
								</td>
							</tr>
						</tbody>
					</table>
					<table style="width: 100%; border: solid 1px #cccccc; padding: 10px; margin-top: 10px;">
						<tbody>
							<tr>
								<td>
									<strong>Morada do Local (Para prestação do serviço)</strong><br>
									{{ $address }}
									<hr style="border-color: #ccc;">
									<strong>Outras Referências de Localização</strong><br>
									{{ $location_info }}
								</td>
							</tr>
						</tbody>
					</table>
					<table style="width: 100%; border: solid 1px #cccccc; padding: 10px; margin-top: 10px;">
						<tr>
							<td>
								<strong>N/ Conhecimento através de</strong><br>
								{{ $info['name'] }}
								<hr style="border-color: #ccc;">
								<strong>Outras observações</strong><br>
								{{ $obs }}
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</body>