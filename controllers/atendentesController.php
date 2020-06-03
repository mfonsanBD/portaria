<?php
class atendentesController extends controller{
	public function index(){
		if (empty($_SESSION['logado'])){
			header("Location: ".URL_BASE.'sair/');
			exit();
		}
		if ($_SESSION['tipo'] != 0) {
			header("Location: ".URL_BASE."painel/");
			exit();
		}

		$this->titulo = "Atendentes";
		
		$u = new Usuario();

		$id = $_SESSION['logado'];
		$infoContas = $u->contaInfos($id);

		$this->fotoUsuario 	= $infoContas['foto'];
		$this->nome 		= $infoContas['nome'];

		$qtdUsuarios = $u->qtdUsuarios();
		$dados['qtdUsuarios'] = $qtdUsuarios;
		
		$this->p = 1;
		$upp = 5;
		if (isset($_GET['p']) && !empty($_GET['p'])) {
			$this->p = addslashes($_GET['p']);
		}
		$totalPaginas = ceil($qtdUsuarios/$upp);
		
		$listaUsuarios = $u->listaUsuarios($this->p, $upp);

		$dados['listaUsuarios'] = $listaUsuarios;
		$dados['totalPaginas'] = $totalPaginas;

		$this->loadTemplate('admin/atendentes', $dados);
	}
	public function adminEdita(){
		$u = new Usuario();
		if (isset($_POST['senha']) && !empty($_POST['senha'])) {
			$id = $_POST['id'];
			$senha = md5($_POST['senha']);
			
			if($u->alteraSenhaUsuario($senha, $id)){
				echo "1";
			}else{
				echo "0";
			}
		}
	}
	public function adminExcluiU(){
		$u = new Usuario();
		if(isset($_POST['id']) && !empty($_POST['id'])){
			$id = $_POST['id'];

			if($u->excluiU($id)){
				echo "1";
			}else{
				echo "0";
			}
		}
	}
	public function adminAddU(){
		$u = new Usuario();
		if(isset($_POST) && !empty($_POST)){
			$nome 		= addslashes($_POST['nome']);
			$login 		= addslashes($_POST['login']);
			$matricula 	= addslashes($_POST['matricula']);
			$senha 		= md5($_POST['senha']);

			if($u->addU($nome, $login, $senha, $matricula)){
				echo "1";
			}else{
				echo "0";
			}
		}
	}
	public function entregaCracha(){
		$a = new Atendimento();
		if(isset($_POST['id']) && !empty($_POST['id'])){
			$id = $_POST['id'];
			
			if($a->entregaCracha($id)){
				echo "1";
			}else{
				echo "0";
			}
		}
	}
	public function addProvisorio(){
		$a = new Atendimento();
		if(isset($_POST) && !empty($_POST)){
			$local 			= $_SESSION['idLocal'];
			$usuario 		= $_SESSION['logado'];
			$cracha 		= $_POST['cracha'];
			$nome 			= $_POST['nome'];
			$telefone 		= $_POST['telefone'];
			$documento 		= $_POST['documento'];
			$autorizacao 	= $_POST['autorizacao'];
			$empresa 		= $_POST['empresa'];
			$area 			= $_POST['autorizacao'];
			
			if($a->addProvisorio($local, $usuario, $cracha, $nome, $telefone, $documento, $autorizacao, $empresa, $area)){
				echo "1";
			}else{
				echo "0";
			}
		}
	}
	public function addVisitante(){
		$a = new Atendimento();
		if(isset($_POST) && !empty($_POST)){
			$local 			= $_SESSION['idLocal'];
			$usuario 		= $_SESSION['logado'];
			$cracha 		= $_POST['cracha'];
			$nome 			= $_POST['nome'];
			$telefone 		= $_POST['telefone'];
			$documento 		= $_POST['documento'];
			$autorizacao 	= $_POST['autorizacao'];
			$empresa 		= $_POST['empresa'];
			$area 			= $_POST['autorizacao'];
			
			if($a->addVisitante($local, $usuario, $cracha, $nome, $telefone, $documento, $autorizacao, $empresa, $area)){
				echo "1";
			}else{
				echo "0";
			}
		}
	}
}