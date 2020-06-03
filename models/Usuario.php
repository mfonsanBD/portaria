<?php
class Usuario extends model{
	public function login($usuario, $senha, $local){
		$sql = $this->conexao->prepare("
				SELECT u.*, l.* FROM port_usuarios AS u
				JOIN port_local AS l
				WHERE u.login = ? AND u.senha = ? AND l.id_local = ?
				LIMIT 1
			");
		$sql->execute(array($usuario, $senha, $local));

		if ($sql->rowCount() > 0) {
			$dado = $sql->fetch();

			$_SESSION['logado'] 					= $dado['id'];
			$_SESSION['tipo'] 						= $dado['tipo'];
			$_SESSION['idLocal'] 					= $dado['id_local'];
			$_SESSION['nomeLocal'] 					= $dado['nome_local'];

			return true;
		}else{
			return false;
		}
	}
	public function verificaSenhaLogin($senha, $login){
		$sql = $this->conexao->prepare("
			SELECT * FROM port_usuarios 
			WHERE senha = ? 
			AND login = ?
		");
		$sql->execute(array($senha, $login));

		if ($sql->rowCount() > 0) {
			return true;
		}else{
			return false;
		}
	}
	public function verificaUsuario($usuario, $senha){
		$sql = $this->conexao->prepare("
			SELECT * FROM port_usuarios 
			WHERE login = ? 
			AND senha = ? 
			AND tipo = 0
		");
		$sql->execute(array($usuario, $senha));

		if ($sql->rowCount() > 0) {
			$dado = $sql->fetch();

			$_SESSION['logado'] 					= $dado['id'];
			$_SESSION['tipo'] 						= $dado['tipo'];

			return true;
		}else{
			return false;
		}
	}
	public function contaInfos($id){
		$array = array();
		$sql = $this->conexao->prepare("SELECT * FROM port_usuarios WHERE id = ?");
		$sql->execute(array($id));

		if($sql->rowCount() > 0){
			$array = $sql->fetch();
		}

		return $array;
	}
	public function qtdUsuarios(){
		$array = array();
		$sql = $this->conexao->prepare("SELECT COUNT(*) AS c FROM port_usuarios WHERE tipo = 1");
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetch();
		}

		return $array['c'];
	}
	public function listaUsuarios($p, $upp){
		$offset = ($p - 1)*$upp;
		$array = array();
		$sql = $this->conexao->prepare("
			SELECT * FROM port_usuarios 
			WHERE tipo = 1 
			ORDER BY id DESC 
			LIMIT $offset, $upp");
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}
	public function verificaLogin($login){
		$sql = $this->conexao->prepare("SELECT login FROM port_usuarios WHERE login = ?");
		$sql->execute(array($login));

		if($sql->rowCount() > 0){
			return true;
		}else{
			return false;
		}
	}
	public function addU($nome, $login, $senha, $matricula){
		$sql = $this->conexao->prepare("INSERT INTO port_usuarios SET nome = ?, login = ?, senha = ?, matricula = ?, tipo = 1, permissao = 1, foto = 'usuario.jpg'");
		$sql->execute(array($nome, $login, $senha, $matricula));

		if($sql->rowCount() > 0){
			return true;
		}else{
			return false;
		}
	}
	public function excluiU($id){
		$sql = $this->conexao->prepare("DELETE FROM port_usuarios WHERE id = ?");
		$sql->execute(array($id));

		if ($sql->rowCount() > 0) {
			return true;
		}else{
			return false;
		}
	}
	public function alteraSenhaUsuario($senha, $id){
		$sql = $this->conexao->prepare("UPDATE port_usuarios SET senha = ? WHERE id = ?");
		$sql->execute(array($senha, $id));

		if ($sql->rowCount() > 0) {
			return true;
		}else{
			return false;
		}
	}
	public function verificaFoto($foto){
		$sql = $this->conexao->prepare("SELECT foto FROM port_usuarios WHERE foto = ?");
		$sql->execute(array($foto));

		if($sql->rowCount() > 0){
			return true;
		}else{
			return false;
		}
	}
	public function alteraFoto($foto, $id){
		$sql = $this->conexao->prepare("UPDATE port_usuarios SET foto = ? WHERE id = ?");
		$sql->execute(array($foto, $id));

		if($sql->rowCount() > 0){
			return true;
		}else{
			return false;
		}
	}
	public function verificaCampos($id){
		$sql = $this->conexao->prepare("SELECT nome, login FROM port_usuarios WHERE id = ?");
		$sql->execute(array($id));

		if($sql->rowCount() > 0){
			return $sql->fetch();
		}
	}
	public function alteraDados($nome, $login, $id){
		$sql = $this->conexao->prepare("UPDATE port_usuarios SET nome = ?, login = ? WHERE id = ?");
		$sql->execute(array($nome, $login, $id));

		if($sql->rowCount() > 0){
			return true;
		}else{
			return false;
		}
	}
	public function alteraNome($nome, $id){
		$sql = $this->conexao->prepare("UPDATE port_usuarios SET nome = ? WHERE id = ?");
		$sql->execute(array($nome, $id));

		if($sql->rowCount() > 0){
			return true;
		}else{
			return false;
		}
	}
	public function alteraLogin($login, $id){
		$sql = $this->conexao->prepare("UPDATE port_usuarios SET login = ? WHERE id = ?");
		$sql->execute(array($login, $id));

		if($sql->rowCount() > 0){
			return true;
		}else{
			return false;
		}
	}
	public function verificaSenha($senha, $id){
		$sql = $this->conexao->prepare("SELECT senha FROM port_usuarios WHERE senha = ? AND id = ?");
		$sql->execute(array($senha, $id));

		if($sql->rowCount() > 0){
			return true;
		}else{
			return false;
		}
	}
	public function alteraSenha($senha, $id){
		$sql = $this->conexao->prepare("UPDATE port_usuarios SET senha = ? WHERE id = ?");
		$sql->execute(array($senha, $id));

		if($sql->rowCount() > 0){
			return true;
		}else{
			return false;
		}
	}
}