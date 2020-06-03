<?php
class painelController extends controller{
	public function index(){
		if (empty($_SESSION['logado'])) {
			header("Location: ".URL_BASE.'sair/');
			exit();
		}
		
		$u = new Usuario();
		$a = new Atendimento();

		$id = $_SESSION['logado'];
		$id_local = $_SESSION['idLocal'];
		$infoContas = $u->contaInfos($id);

		$this->fotoUsuario 		= $infoContas['foto'];
		$this->nome 			= $infoContas['nome'];

		$this->titulo = "Painel de Controle";

		switch ($_SESSION['tipo']) {
			case 1:
				if ($_SESSION['tipo'] != 1) {
					header("Location: ".URL_BASE."admin/cliente/");
					exit();
				}

				$qtdAtendimentoVisitante = $a->qtdAtendimentoVisitante($id_local);
				$dados['qtdAtendimentoVisitante'] = $qtdAtendimentoVisitante;

				$qtdExtraviadoVisitante = $a->qtdExtraviadoVisitante($id_local);
				$dados['qtdExtraviadoVisitante'] = $qtdExtraviadoVisitante;

				$qtdAtendimentoProvisorio = $a->qtdAtendimentoProvisorio($id_local);
				$dados['qtdAtendimentoProvisorio'] = $qtdAtendimentoProvisorio;

				$qtdExtraviadoProvisorio = $a->qtdExtraviadoProvisorio($id_local);
				$dados['qtdExtraviadoProvisorio'] = $qtdExtraviadoProvisorio;

				$atendimentosVisitanteHoje = $a->atendimentosVisitanteHoje($id_local);
				$dados['atendimentosVisitanteHoje'] = $atendimentosVisitanteHoje;

				$atendimentosProvisorioHoje = $a->atendimentosProvisorioHoje($id_local);
				$dados['atendimentosProvisorioHoje'] = $atendimentosProvisorioHoje;

				$atendimentosVisitanteMes = $a->atendimentosVisitanteMes($id_local);
				$dados['atendimentosVisitanteMes'] = $atendimentosVisitanteMes;

				$atendimentosProvisorioMes = $a->atendimentosProvisorioMes($id_local);
				$dados['atendimentosProvisorioMes'] = $atendimentosProvisorioMes;

				$emUso = $a->emUso($id_local);
				$dados['emUso'] = $emUso;

				$totalCracha = $a->totalCracha($id_local);
				$dados['totalCracha'] = $totalCracha;

				$this->loadTemplate('cliente/painel', $dados);
			break;
			
			default:
				unset($_SESSION['logado']);
				unset($_SESSION['nome_do_usuario']);
				unset($_SESSION['permissao']);
				unset($_SESSION['tipo']);
				header("Location: ".URL_BASE);
				exit();
			break;
		}
	}
}