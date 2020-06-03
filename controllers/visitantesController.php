<?php
class visitantesController extends controller{
	public function index(){
		if (empty($_SESSION['logado'])){
			header("Location: ".URL_BASE.'sair/');
			exit();
		}
		if ($_SESSION['tipo'] != 1) {
			header("Location: ".URL_BASE."atentendes/");
			exit();
		}

		$this->titulo = "Visitantes";
		
		$u = new Usuario();
		$a = new Atendimento();

		$id_usuario = $_SESSION['logado'];
		$id_local = $_SESSION['idLocal'];
		$infoContas = $u->contaInfos($id_usuario);

		$this->fotoUsuario 	= $infoContas['foto'];
		$this->nome 		= $infoContas['nome'];

		$qtdAtendimentoVisitante = $a->qtdAtendimentoVisitante($id_local);
		$dados['qtdAtendimentoVisitante'] = $qtdAtendimentoVisitante;
		
		$this->p = 1;
		$app = 10;
		if (isset($_GET['p']) && !empty($_GET['p'])) {
			$this->p = addslashes($_GET['p']);
		}
		$totalPaginas = ceil($qtdAtendimentoVisitante/$app);
		
		$listaAtendimentoVisitante = $a->listaAtendimentoVisitante($id_local, $this->p, $app);

		$dados['listaAtendimentoVisitante'] = $listaAtendimentoVisitante;
		$dados['totalPaginas'] = $totalPaginas;

		$this->loadTemplate('cliente/visitantes', $dados);
	}
	public function provisorios(){
		if (empty($_SESSION['logado'])) {
			header("Location: ".URL_BASE);
			exit();
		}
		if ($_SESSION['tipo'] != 1) {
			header("Location: ".URL_BASE."painel/cliente/");
			exit();
		}

		$this->titulo = "Provisórios";
		
		$u = new Usuario();
		$a = new Atendimento();

		$id = $_SESSION['logado'];
		$id_local = $_SESSION['idLocal'];

		$infoContas = $u->contaInfos($id);

		$this->fotoUsuario 	= $infoContas['foto'];
		$this->nome 		= $infoContas['nome'];

		$qtdAtendimentoProvisorio = $a->qtdAtendimentoProvisorio($id_local);
		$dados['qtdAtendimentoProvisorio'] = $qtdAtendimentoProvisorio;
		
		$this->p = 1;
		$app = 10;
		if (isset($_GET['p']) && !empty($_GET['p'])) {
			$this->p = addslashes($_GET['p']);
		}
		$totalPaginas = ceil($qtdAtendimentoProvisorio/$app);
		
		$listaAtendimentoProvisorio = $a->listaAtendimentoProvisorio($id_local, $this->p, $app);

		$dados['listaAtendimentoProvisorio'] = $listaAtendimentoProvisorio;
		$dados['totalPaginas'] = $totalPaginas;
		
		$this->loadTemplate('cliente/provisorios', $dados);
	}
	public function buscaProvisorio(){
		if(isset($_POST) && !empty($_POST)){
			$cracha = addslashes($_POST['busca']);
			
			$a = new Atendimento();
			$id_local = $_SESSION['idLocal'];

			$qtdbuscado = $a->qtdbuscadoP($cracha, $id_local);
			$crachaBuscado = $a->buscaProvisorio($cracha, $id_local);

			if($crachaBuscado != false){
				echo "<div class='col-lg-12 mb-4 listaCrachaProvisorio' id='listaCrachas'>";
					foreach ($crachaBuscado as $cb) {
						echo "
							<div class='col-md-12 bg-white rounded-lg pt-3 pb-3 mb-3 shadow-sm'>
								<div class='row'>
									<div class='col-md-1 align-self-center text-center'>
										<button id='uexcluir' value=".$cb['id_atendimento']." type='button' class='btn btn-success btn-sm' data-toggle='modal' data-target='#entrega' data-id=".$cb['id_atendimento']." data-cracha=".$cb['cracha'].">
											<i class='fas fa-check'></i> Entrega
										</button>
									</div>
									<div class='col-md-2 align-self-center text-center'>
										<h6 class='mb-0'>Nº do Crachá:</h6>
										<p class='p-0 m-0 text-padrao text-break'>".$cb['cracha']."</p>
									</div>
									<div class='col-md-2 align-self-center text-center'>
										<h6 class='mb-0'>Nome:</h6>
										<p class='p-0 m-0 text-padrao text-break'>".$cb['nome_visitante']."</p>
									</div>
									<div class='col-md-1 align-self-center text-center'>
										<h6 class='mb-0'>Documento:</h6>
										<p class='p-0 m-0 text-padrao text-break'>".$cb['cpf_visitante']."</p>
									</div>
									<div class='col-md-2 align-self-center text-center'>
										<h6 class='mb-0'>Telefone:</h6>
										<p class='p-0 m-0 text-padrao text-break'>".$cb['telefone_visitante']."</p>
									</div>
									<div class='col-md-2 align-self-center text-center'>
										<h6 class='mb-0'>Autorização:</h6>
										<p class='p-0 m-0 text-padrao text-break'>".$cb['alfa']."</p>
									</div>
									<div class='col-md-1 align-self-center text-center'>
										<h6 class='mb-0'>Empresa:</h6>
										<p class='p-0 m-0 text-padrao text-break'>".$cb['empresa_visitante']."</p>
									</div>
									<div class='col-md-1 align-self-center text-center'>
										<h6 class='mb-0'>Área:</h6>
										<p class='p-0 m-0 text-padrao text-break'>".$cb['area']."</p>
									</div>
								</div>
							</div>
						";
					}
				echo "</div>";
				echo "<div class='col-lg-12 p-0 pag'>";
					echo "<div class='col-md-12 text-center mb-1'>";
						echo "<p class='pt-2 pb-2 m-0 text-secondary'>";
							if($qtdbuscado == 0 || $qtdbuscado == 1){
								echo $qtdbuscado." atendimento provisório encontrado.";
							}else{
								echo $qtdbuscado." atendimentos provisório encontrados.";
							}
						echo "</p>";
					echo "</div>";
				echo "</div>";
			}else{
				echo "0";
			}
		}
	}
	public function buscaVisitante(){
		if(isset($_POST) && !empty($_POST)){
			$cracha = addslashes($_POST['busca']);
			
			$a = new Atendimento();
			$id_local = $_SESSION['idLocal'];

			$qtdbuscado = $a->qtdbuscadoV($cracha, $id_local);
			$crachaBuscado = $a->buscaVisitante($cracha, $id_local);

			if($crachaBuscado != false){
				echo "<div class='col-lg-12 mb-4 listaCrachaVisitante' id='listaCrachas'>";
					foreach ($crachaBuscado as $cb) {
						echo "
							<div class='col-md-12 bg-white rounded-lg pt-3 pb-3 mb-3 shadow-sm'>
								<div class='row'>
									<div class='col-md-1 align-self-center text-center'>
										<button id='uexcluir' value=".$cb['id_atendimento']." type='button' class='btn btn-success btn-sm' data-toggle='modal' data-target='#entrega' data-id=".$cb['id_atendimento']." data-cracha=".$cb['cracha'].">
											<i class='fas fa-check'></i> Entrega
										</button>
									</div>
									<div class='col-md-2 align-self-center text-center'>
										<h6 class='mb-0'>Número do Crachá:</h6>
										<p class='p-0 m-0 text-padrao text-break'>".$cb['cracha']."</p>
									</div>
									<div class='col-md-2 align-self-center text-center'>
										<h6 class='mb-0'>Nome:</h6>
										<p class='p-0 m-0 text-padrao text-break'>".$cb['nome_visitante']."</p>
									</div>
									<div class='col-md-1 align-self-center text-center'>
										<h6 class='mb-0'>Empresa:</h6>
										<p class='p-0 m-0 text-padrao text-break'>".$cb['empresa_visitante']."</p>
									</div>
									<div class='col-md-1 align-self-center text-center'>
										<h6 class='mb-0'>Documento:</h6>
										<p class='p-0 m-0 text-padrao text-break'>".$cb['cpf_visitante']."</p>
									</div>
									<div class='col-md-2 align-self-center text-center'>
										<h6 class='mb-0'>Telefone:</h6>
										<p class='p-0 m-0 text-padrao text-break'>".$cb['telefone_visitante']."</p>
									</div>
									<div class='col-md-2 align-self-center text-center'>
										<h6 class='mb-0'>Visitado:</h6>
										<p class='p-0 m-0 text-padrao text-break'>".$cb['alfa']."</p>
									</div>
									<div class='col-md-1 align-self-center text-center'>
										<h6 class='mb-0'>Área Visitada:</h6>
										<p class='p-0 m-0 text-padrao text-break'>".$cb['area']."</p>
									</div>
								</div>
							</div>
						";
					}
				echo "</div>";
				echo "<div class='col-lg-12 p-0 pag'>";
					echo "<div class='col-md-12 text-center mb-1'>";
						echo "<p class='pt-2 pb-2 m-0 text-secondary'>";
							if($qtdbuscado == 0 || $qtdbuscado == 1){
								echo $qtdbuscado." atendimento de visitantes encontrado.";
							}else{
								echo $qtdbuscado." atendimentos de visitantes encontrados.";
							}
						echo "</p>";
					echo "</div>";
				echo "</div>";
			}else{
				echo "0";
			}
		}
	}
}