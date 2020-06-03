<?php
date_default_timezone_set('America/Sao_Paulo');
if($this->fotoUsuario == "usuario.jpg"){
	$usuarioFoto = URL_BASE.'assets/img/'.$this->fotoUsuario;
}else{
	$usuarioFoto = URL_BASE.'assets/img/usuarios/'.$_SESSION['logado'].'/'.$this->fotoUsuario;
}
?>
<div class="container">
	<header>
		<nav class="navbar">
			<a href="<?= URL_BASE ?>painel" class="navbar-brand">
				<img src="<?= URL_BASE ?>assets/img/logo2.png" width="150" alt="Logotipo Controle de Orçamento" class="d-inline-block align-top">
			</a>
			<ul class="nav justify-content-center">
				<li class="nav-item <?=($this->titulo == "Atendentes") ? 'ativo' : ''?>">
					<a class="nav-link text-secondary" href="<?= URL_BASE ?>atendentes/">Atendentes</a>
				</li>
				<li class="nav-item <?=($this->titulo == "Locais de Atendimento") ? 'ativo' : ''?>">
					<a class="nav-link text-secondary" href="<?= URL_BASE ?>locais/">Locais de Atendimento</a>
				</li>
				<li class="nav-item <?=($this->titulo == "Configurações da Conta") ? 'ativo' : ''?>">
					<a class="nav-link text-secondary" href="<?= URL_BASE ?>configuracoes/">Configurações da Conta</a>
				</li>
			</ul>
			<button type="button" class="btn bg-danger shadow-sm ml-1 text-white rounded-lg" id="sair">
				<i class="fas fa-power-off"></i>
				<span class="m-0 p-0 text-white">Sair</span>
			</button>
		</nav>
	</header>
</div>
<div class="container-fluid bg-padrao pt-5 pb-5 text-center">
	<div class="row justify-content-center">
		<div class="col-md-1 align-self-center">
			<img src="<?=$usuarioFoto?>" width="120" alt="Usuário" class="d-inline-block align-top rounded-circle">
		</div>
		<div class="col-md-4 pt-4 pb-4">
			<div class="row">
				<div class="col-md-12">
					<h1 class="text-uppercase m-0 p-0 cumprimentos">
						<?php
							if(date("d/m") < "20/03" && date("d/m") > "04/11"){
								$hora = date("H", strtotime("-1 hour"));
							}else{
								$hora = date("H");
							}

							switch ($hora) {
								case (($hora) >= "00" && $hora < "12"):
									$cumprimento = "Bom dia";
								break;

								case ($hora >= "12" && $hora < "18"):
									$cumprimento = "Boa tarde";
								break;
								
								default:
									$cumprimento = "Boa noite";
								break;
							}
						?>
						<?=$cumprimento.", ".$this->nome;?>!