<?php
class locaisController extends controller{
	public function index(){
		if (empty($_SESSION['logado'])) {
			header("Location: ".URL_BASE.'sair/');
			exit();
		}
		
		$u = new Usuario();

		$id = $_SESSION['logado'];
		$infoContas = $u->contaInfos($id);

		$this->fotoUsuario 	= $infoContas['foto'];
		$this->nome 		= $infoContas['nome'];

		$this->titulo = "Locais de Atendimento";

		$l = new Locais();

		$qtdLocais = $l->qtdLocais();
		$dados['qtdLocais'] = $qtdLocais;
		
		$this->p = 1;
		$lpp = 5;
		if (isset($_GET['p']) && !empty($_GET['p'])) {
			$this->p = addslashes($_GET['p']);
		}
		$totalPaginas = ceil($qtdLocais/$lpp);
		
		$listaLocais = $l->listaLocais($this->p, $lpp);

		$dados['listaLocais'] = $listaLocais;
		$dados['totalPaginas'] = $totalPaginas;

		$this->loadTemplate('admin/locais', $dados);
	}
	public function addLocais(){
		$l = new Locais();

		if(isset($_POST) && !empty($_POST)){			
			$nome 			= addslashes($_POST['nome']);
			$telefone 		= addslashes($_POST['telefone']);
			$endereco 		= addslashes($_POST['endereco']);
			$responsavel 	= addslashes($_POST['responsavel']);

			if($l->adicionaL($nome, $telefone, $endereco, $responsavel)){
				echo "1";
			}else{
				echo "0";
			}
		}
	}
	public function verificaCampos(){
		$l = new Locais();
		if(isset($_POST) && !empty($_POST)){
			$id = addslashes($_POST['id']);
			$dados = $l->verificaCampos($id);
			
			$array = array(
				'nome' => $dados['nome_local'],
				'telefone' => $dados['telefone_local'],
				'endereco' => $dados['endereco_local'],
				'responsavel' => $dados['responsavel']
			);
		}

		echo json_encode($array);
	}
	public function adminEditaL(){
		$l = new Locais();
		if (isset($_POST) && !empty($_POST)) {
			$id = $_POST['id'];
			$nome 			= addslashes($_POST['nome']);
			$telefone 		= addslashes($_POST['telefone']);
			$endereco 		= addslashes($_POST['endereco']);
			$responsavel 	= addslashes($_POST['responsavel']);
			
			if($l->editaL($nome, $telefone, $endereco, $responsavel, $id)){
				echo "1";
			}else{
				echo "0";
			}
		}
	}
	public function adminExcluiL(){
		$l = new Locais();
		if(isset($_POST['id']) && !empty($_POST['id'])){
			$id = $_POST['id'];

			if($l->excluiL($id)){
				echo "1";
			}else{
				echo "0";
			}
		}
	}
	public function alteraNome(){
		if(isset($_POST['nome']) && !empty($_POST['nome'])){
			$nome = addslashes($_POST['nome']);
			$id = addslashes($_POST['id']);

			$l = new Locais();
			if($l->alteraNome($nome, $id)){
				echo "1";
			}else{
				echo "0";
			}
		}
	}
	public function alteraTelefone(){
		if(isset($_POST['telefone']) && !empty($_POST['telefone'])){
			$telefone = addslashes($_POST['telefone']);
			$id = addslashes($_POST['id']);

			$l = new Locais();
			if($l->alteraTelefone($telefone, $id)){
				echo "1";
			}else{
				echo "0";
			}
		}
	}
	public function alteraEndereco(){
		if(isset($_POST['endereco']) && !empty($_POST['endereco'])){
			$endereco = addslashes($_POST['endereco']);
			$id = addslashes($_POST['id']);

			$l = new Locais();
			if($l->alteraEndereco($endereco, $id)){
				echo "1";
			}else{
				echo "0";
			}
		}
	}
	public function alteraResponsavel(){
		if(isset($_POST['responsavel']) && !empty($_POST['responsavel'])){
			$responsavel = addslashes($_POST['responsavel']);
			$id = addslashes($_POST['id']);

			$l = new Locais();
			if($l->alteraResponsavel($responsavel, $id)){
				echo "1";
			}else{
				echo "0";
			}
		}
	}
	public function alteraNomeTelefone(){
		if(isset($_POST) && !empty($_POST)){
			$nome 			= addslashes($_POST['nome']);
			$telefone 		= addslashes($_POST['telefone']);
			$id = addslashes($_POST['id']);

			$l = new Locais();
			if($l->alteraNomeTelefone($nome, $telefone, $id)){
				echo "1";
			}else{
				echo "0";
			}
		}
	}
	public function alteraNomeEndereco(){
		if(isset($_POST) && !empty($_POST)){
			$nome 			= addslashes($_POST['nome']);
			$endereco 		= addslashes($_POST['endereco']);
			$id = addslashes($_POST['id']);

			$l = new Locais();
			if($l->alteraNomeEndereco($nome, $endereco, $id)){
				echo "1";
			}else{
				echo "0";
			}
		}
	}
	public function alteraNomeResponsavel(){
		if(isset($_POST) && !empty($_POST)){
			$nome 			= addslashes($_POST['nome']);
			$responsavel 	= addslashes($_POST['responsavel']);
			$id = addslashes($_POST['id']);

			$l = new Locais();
			if($l->alteraNomeResponsavel($nome, $responsavel, $id)){
				echo "1";
			}else{
				echo "0";
			}
		}
	}
	public function alteraTelefoneEndereco(){
		if(isset($_POST) && !empty($_POST)){
			$telefone 		= addslashes($_POST['telefone']);
			$endereco 		= addslashes($_POST['endereco']);
			$id = addslashes($_POST['id']);

			$l = new Locais();
			if($l->alteraTelefoneEndereco($telefone, $endereco, $id)){
				echo "1";
			}else{
				echo "0";
			}
		}
	}
	public function alteraTelefoneResponsavel(){
		if(isset($_POST) && !empty($_POST)){
			$telefone 		= addslashes($_POST['telefone']);
			$responsavel 	= addslashes($_POST['responsavel']);
			$id = addslashes($_POST['id']);

			$l = new Locais();
			if($l->alteraTelefoneResponsavel($telefone, $responsavel, $id)){
				echo "1";
			}else{
				echo "0";
			}
		}
	}
	public function alteraEnderecoResponsavel(){
		if(isset($_POST) && !empty($_POST)){
			$endereco 		= addslashes($_POST['endereco']);
			$responsavel 	= addslashes($_POST['responsavel']);
			$id = addslashes($_POST['id']);

			$l = new Locais();
			if($l->alteraEnderecoResponsavel($endereco, $responsavel, $id)){
				echo "1";
			}else{
				echo "0";
			}
		}
	}
	public function alteraNomeTelefoneEndereco(){
		if(isset($_POST) && !empty($_POST)){
			$nome 			= addslashes($_POST['nome']);
			$telefone 		= addslashes($_POST['telefone']);
			$endereco 		= addslashes($_POST['endereco']);
			$id = addslashes($_POST['id']);

			$l = new Locais();
			if($l->alteraNomeTelefoneEndereco($nome, $telefone, $endereco, $id)){
				echo "1";
			}else{
				echo "0";
			}
		}
	}
	public function alteraNomeEnderecoResponsavel(){
		if(isset($_POST) && !empty($_POST)){
			$nome 			= addslashes($_POST['nome']);
			$endereco 		= addslashes($_POST['endereco']);
			$responsavel 	= addslashes($_POST['responsavel']);
			$id = addslashes($_POST['id']);

			$l = new Locais();
			if($l->alteraNomeEnderecoResponsavel($nome, $endereco, $responsavel, $id)){
				echo "1";
			}else{
				echo "0";
			}
		}
	}
	public function alteraTelefoneEnderecoResponsavel(){
		if(isset($_POST) && !empty($_POST)){
			$telefone 		= addslashes($_POST['telefone']);
			$endereco 		= addslashes($_POST['endereco']);
			$responsavel 	= addslashes($_POST['responsavel']);
			$id = addslashes($_POST['id']);

			$l = new Locais();
			if($l->alteraTelefoneEnderecoResponsavel($telefone, $endereco, $responsavel, $id)){
				echo "1";
			}else{
				echo "0";
			}
		}
	}
}