<?php
class loginController extends controller{
	public function index(){
		$l = new Locais();
		$listaLocais = $l->listaLocaisLogin();
		$dados['listaLocais'] = $listaLocais;

		$this->titulo = "Acesse sua conta e vamos ao trabalho!";
		$this->loadTemplate('login', $dados);
	}
	public function logar(){
		$u = new Usuario();
		if (isset($_POST['usuario']) && !empty($_POST['usuario'])) {
			$usuario 	= addslashes($_POST['usuario']);
			$senha 		= md5($_POST['senha']);
			$local 		= addslashes($_POST['local']);
			
			if($u->verificaUsuario($usuario, $senha)){
				echo 2;
			}else{
				if($u->login($usuario, $senha, $local)){
					echo 1;
				}else{
					echo 0;
				}
			}
		}
	}
	public function verificaLogin(){
		if(isset($_POST['login']) && !empty($_POST['login'])){
			$login = addslashes($_POST['login']);

			$u = new Usuario();

			if($u->verificaLogin($login)){
				echo "1";
			}else{
				echo "0";
			}
		}
	}
	public function verificaSenhaLogin(){
		if(isset($_POST['senha']) && !empty($_POST['senha'])){
			$senha 	= md5(addslashes($_POST['senha']));
			$login 	= addslashes($_POST['login']);

			$u = new Usuario();

			if($u->verificaSenhaLogin($senha, $login)){
				echo "1";
			}else{
				echo "0";
			}
		}
	}
	public function sair(){
		unset($_SESSION['logado']);
		unset($_SESSION['nome_do_usuario']);
		unset($_SESSION['permissao']);
		unset($_SESSION['tipo']);
		header("Location: ".URL_BASE);
	}
}