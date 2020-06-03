<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
require '../configuracao.php';

$array = array();
$sql = $conexao->prepare("
		SELECT COUNT(*) AS c FROM port_atendimento
		WHERE local_id = ?
		AND tipo = 0
		AND status = 1
	");
$sql->execute(array($_SESSION['idLocal']));

if ($sql->rowCount() > 0) {
	$array = $sql->fetch();
}


$query = $conexao->prepare("
	SELECT * FROM port_atendimento 
	WHERE local_id = ?
		AND tipo = 0
		AND status = 1
	ORDER BY id_atendimento DESC
");
$query->execute(array($_SESSION['idLocal']));

if ($query->rowCount() > 0) {
	$listaVisitantes = $query->fetchAll();
}


if(date("d/m") < "20/03" || date("d/m") > "04/11"){
	$data = date("d/m/y H:i", strtotime("-1 hour"));
}else{
	$data = date("d/m/y H:i");
}
?>
<html>
<head>
    <style>
    	@page{
    		margin: 70px 0;
    	}
    	body{
    		margin: 0;
    		padding: 0;
    		font-family: 'Helvetica';
    	}
    	header{
    		position: fixed;
    		top: -70px;
    		left: 0;
    		right: 0;
    		width: 100%;
    		text-align: center;
    		background: #2d2d6d;
    		color:#FFFFFF;
    		padding: 20px 10px;
    	}
    	header h1{
    		width: 60%;
    		margin: 0 auto;
    		line-height: 0.8;
    		text-transform: uppercase;
    		font-size: 20px;
    	}
    	table{
    		width: 100%;
    		position: relative;
    		top: 80px;
    	}
    	table th{
    		text-transform: uppercase;
    		font-size: 12px;
    	}
    	tr:nth-child(2n+0){
    		background-color: #ededed;
    	}
    	footer{
    		position: fixed;
    		bottom: -31px;
    		left: 0;
    		width: 100%;
    		padding: 10px;
    		text-align: center;
    		background-color: #2d2d6d;
    		color:#FFFFFF;
    	}
    	footer .paginas:after{
    		content: counter(page);
    	}
    </style>
</head>
<body>
<header>
	<img src="logo.png" width="120" alt="Logo M8D Engenharia">
	<h1>Relatórios de <?=$array['c'];?> Atendimentos de visitantes na unidade <?=$_SESSION['nomeLocal']?></h1>
</header>
<footer>
	Gerado dia <?=$data?> - <span class="paginas">Página </span>
</footer>
<table>
	<tr>
		<th align="center">Número do Crachá</th>
		<th align="center">Nome do Visitante</th>
		<th align="center">Data da Entrada</th>
		<th align="center">Documento</th>
		<th align="center">Telefone</th>
		<th align="center">Autorização</th>
	</tr>
	<?php
		if($array['c'] != 0){
			foreach ($listaVisitantes as $lav) {
	?>
				<tr>
					<td align="center"><?=$lav['cracha']?></td>
					<td align="center"><?=$lav['nome_visitante']?></td>
					<td align="center">
						<?php
							echo date('d/m/y H:i', strtotime($lav['data_entrada']));
						?>			
					</td>
					<td align="center"><?=$lav['cpf_visitante']?></td>
					<td align="center"><?=$lav['telefone_visitante']?></td>
					<td align="center"><?=$lav['alfa']?></td>
				</tr>
	<?php
			}
		}else{
	?>
			<tr>
				<td align="center" colspan="6">Nenhum atendimento de visitantes realizado</td>
			</tr>
	<?php
		}
	?>
</table>
</body>
</html>