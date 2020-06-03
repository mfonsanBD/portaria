<?php 
require 'topo.php';
?>
					</h1>
				</div>
				<div class="col-md-12">
					<p class="p-0 m-0 mt-2 subtitulo">Informações gerais do sistema.</p>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="container" class="mt-5 col-md-12 pag">
	<div class="pt-5 text-center">
		<h3 class="text-uppercase titulo_pagina mb-5"><?=$this->titulo;?></h3>
	</div>
	<div class="col-md-12 mb-5">
		<div class="row justify-content-center">
			<div class="col-md-2 bg-white m-2 rounded-lg shadow-sm p-3">
				<div class="row">
					<div class="col-md-12 text-center">
						<h1 class="text-padrao p-0 m-0" style="font-size: 5.5em;"><?=$atendimentosProvisorioHoje?></h1>
						<p class="text-secondary p-0 m-0 text" style="font-size: 18px;">
							<?php
								if($atendimentosProvisorioHoje == 0){
									echo "Nenhum Atendimento Provisório Hoje";
								}
								else if($atendimentosProvisorioHoje == 1){
									echo "Atendimento Provisório Hoje";
								}
								else{
									echo "Atendimentos Provisório Hoje";
								}
							?>
						</p>
					</div>
				</div>
			</div>
			<div class="col-md-2 bg-white m-2 rounded-lg shadow-sm p-3">
				<div class="row">
					<div class="col-md-12 text-center">
						<h1 class="text-padrao p-0 m-0" style="font-size: 5.5em;"><?=$atendimentosProvisorioMes?></h1>
						<p class="text-secondary p-0 m-0 text" style="font-size: 18px;">
							<?php
								if($atendimentosProvisorioMes == 0){
									echo "Nenhum Atendimento Provisório este Mês";
								}
								else if($atendimentosProvisorioMes == 1){
									echo "Atendimento Provisório este Mês";
								}
								else{
									echo "Atendimentos Provisório este Mês";
								}
							?>
						</p>
					</div>
				</div>
			</div>
			<div class="col-md-2 bg-white m-2 rounded-lg shadow-sm p-3">
				<div class="row">
					<div class="col-md-12 text-center">
						<h1 class="text-padrao p-0 m-0" style="font-size: 5.5em;"><?=$atendimentosVisitanteHoje?></h1>
						<p class="text-secondary p-0 m-0 text" style="font-size: 18px;">
							<?php
								if($atendimentosVisitanteHoje == 0){
									echo "Nenhum Atendimento a Visitante Hoje";
								}
								else if($atendimentosVisitanteHoje == 1){
									echo "Atendimento a Visitante Hoje";
								}
								else{
									echo "Atendimentos a Visitante Hoje";
								}
							?>
						</p>
					</div>
				</div>
			</div>
			<div class="col-md-2 bg-white m-2 rounded-lg shadow-sm p-3">
				<div class="row">
					<div class="col-md-12 text-center">
						<h1 class="text-padrao p-0 m-0" style="font-size: 5.5em;"><?=$atendimentosVisitanteMes?></h1>
						<p class="text-secondary p-0 m-0 text" style="font-size: 18px;">
							<?php
								if($atendimentosVisitanteMes == 0){
									echo "Nenhum Atendimento a Visitante este Mês";
								}
								else if($atendimentosVisitanteMes == 1){
									echo "Atendimento a Visitante este Mês";
								}
								else{
									echo "Atendimentos a Visitante este Mês";
								}
							?>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="pt-5 pb-0 text-center">
		<h3 class="text-uppercase titulo_pagina mb-5">Controle de crachá na unidade <b class="text-padrao"><?=$_SESSION['nomeLocal'];?></b></h3>
	</div>
	<div class="col-md-8 offset-md-2">
		<canvas id="canvas" height="200"></canvas>
	</div>
</div>

<script>
	var barras = {
		type: 'bar',
		data: {
			datasets: [{
				data: [
					<?=$qtdAtendimentoProvisorio?>,
					<?=$qtdAtendimentoVisitante?>,
					<?=$qtdExtraviadoProvisorio?>,
					<?=$qtdExtraviadoVisitante?>,
					<?=$emUso?>,
					<?=$totalCracha?>
				],
				backgroundColor: ['#2d2d6d', '#2d2d6d', '#2d2d6d', '#2d2d6d', '#2d2d6d', '#2d2d6d']
			}],
			labels: [
				'Provisório',
				'Visitante',
				'Extraviado Provisório',
				'Extraviado Visitante',
				'Em Uso',
				'Total'
			]
		},
		options: {
			responsive: true,
			legend: { display: false },
		    scales: {
		        yAxes: [{
		            ticks: {
		                beginAtZero: true
		            }
		        }]
		    }
		}
	};

	window.onload = function() {
		var ctxE = document.getElementById('canvas').getContext('2d');
		window.myBar = new Chart(ctxE, barras);
	};
</script>