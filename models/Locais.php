<?php
class Locais extends model{
	public function adicionaL($nome, $telefone, $endereco, $responsavel){
		$sql = $this->conexao->prepare("INSERT INTO port_local SET nome_local = ?, telefone_local = ?, endereco_local = ?, responsavel = ?");
		$sql->execute(array($nome, $telefone, $endereco, $responsavel));

		if ($sql->rowCount() > 0) {
			return true;
		}else{
			return false;
		}
	}
	public function qtdLocais(){
		$array = array();
		$sql = $this->conexao->prepare("SELECT COUNT(*) AS l FROM port_local");
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetch();
		}

		return $array['l'];
	}
	public function listaLocais($p, $lpp){
		$offset = ($p - 1)*$lpp;
		$array = array();
		$sql = $this->conexao->prepare("
			SELECT * FROM port_local 
			ORDER BY id_local DESC
			LIMIT $offset, $lpp");
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}

		return $array;
	}
	public function listaLocaisLogin(){
		$array = array();
		$sql = $this->conexao->prepare("SELECT * FROM port_local ORDER BY id_local ASC");
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}

		return $array;
	}
	public function verificaCampos($id){
		$sql = $this->conexao->prepare("SELECT * FROM port_local WHERE id_local = ?");
		$sql->execute(array($id));

		if($sql->rowCount() > 0){
			return $sql->fetch();
		}
	}
	public function editaL($nome, $telefone, $endereco, $responsavel, $id){
		$sql = $this->conexao->prepare("UPDATE port_local SET nome_local = ?, telefone_local = ?, endereco_local = ?, responsavel = ? WHERE id_local = ?");
		$sql->execute(array($nome, $telefone, $endereco, $responsavel, $id));

		if($sql->rowCount() > 0){
			return true;
		}else{
			return false;
		}
	}
	public function alteraNome($nome, $id){
		$sql = $this->conexao->prepare("UPDATE port_local SET nome_local = ? WHERE id_local = ?");
		$sql->execute(array($nome, $id));

		if($sql->rowCount() > 0){
			return true;
		}else{
			return false;
		}
	}
	public function alteraTelefone($telefone, $id){
		$sql = $this->conexao->prepare("UPDATE port_local SET telefone_local = ? WHERE id_local = ?");
		$sql->execute(array($telefone, $id));

		if($sql->rowCount() > 0){
			return true;
		}else{
			return false;
		}
	}
	public function alteraEndereco($endereco, $id){
		$sql = $this->conexao->prepare("UPDATE port_local SET endereco_local = ? WHERE id_local = ?");
		$sql->execute(array($endereco, $id));

		if($sql->rowCount() > 0){
			return true;
		}else{
			return false;
		}
	}
	public function alteraResponsavel($responsavel, $id){
		$sql = $this->conexao->prepare("UPDATE port_local SET responsavel = ? WHERE id_local = ?");
		$sql->execute(array($responsavel, $id));

		if($sql->rowCount() > 0){
			return true;
		}else{
			return false;
		}
	}
	public function alteraNomeTelefone($nome, $telefone, $id){
		$sql = $this->conexao->prepare("UPDATE port_local SET nome_local = ?, telefone_local = ? WHERE id_local = ?");
		$sql->execute(array($nome, $telefone, $id));

		if($sql->rowCount() > 0){
			return true;
		}else{
			return false;
		}
	}
	public function alteraNomeEndereco($nome, $endereco, $id){
		$sql = $this->conexao->prepare("UPDATE port_local SET nome_local = ?, endereco_local = ? WHERE id_local = ?");
		$sql->execute(array($nome, $endereco, $id));

		if($sql->rowCount() > 0){
			return true;
		}else{
			return false;
		}
	}
	public function alteraNomeResponsavel($nome, $responsavel, $id){
		$sql = $this->conexao->prepare("UPDATE port_local SET nome_local = ?, responsavel = ? WHERE id_local = ?");
		$sql->execute(array($nome, $responsavel, $id));

		if($sql->rowCount() > 0){
			return true;
		}else{
			return false;
		}
	}
	public function alteraTelefoneEndereco($telefone, $endereco, $id){
		$sql = $this->conexao->prepare("UPDATE port_local SET telefone_local = ?, endereco_local = ? WHERE id_local = ?");
		$sql->execute(array($telefone, $endereco, $id));

		if($sql->rowCount() > 0){
			return true;
		}else{
			return false;
		}
	}
	public function alteraTelefoneResponsavel($telefone, $responsavel, $id){
		$sql = $this->conexao->prepare("UPDATE port_local SET telefone_local = ?, responsavel = ? WHERE id_local = ?");
		$sql->execute(array($telefone, $responsavel, $id));

		if($sql->rowCount() > 0){
			return true;
		}else{
			return false;
		}
	}
	public function alteraNomeTelefoneEndereco($nome, $telefone, $endereco, $id){
		$sql = $this->conexao->prepare("UPDATE port_local SET nome_local = ?, telefone_local = ?, endereco_local = ? WHERE id_local = ?");
		$sql->execute(array($nome, $telefone, $endereco, $id));

		if($sql->rowCount() > 0){
			return true;
		}else{
			return false;
		}
	}
	public function alteraNomeEnderecoResponsavel($nome, $endereco, $responsavel, $id){
		$sql = $this->conexao->prepare("UPDATE port_local SET nome_local = ?, endereco_local = ?, responsavel = ? WHERE id_local = ?");
		$sql->execute(array($nome, $endereco, $responsavel, $id));

		if($sql->rowCount() > 0){
			return true;
		}else{
			return false;
		}
	}
	public function alteraTelefoneEnderecoResponsavel($telefone, $endereco, $responsavel, $id){
		$sql = $this->conexao->prepare("UPDATE port_local SET telefone_local = ?, endereco_local = ?, responsavel = ? WHERE id_local = ?");
		$sql->execute(array($telefone, $endereco, $responsavel, $id));

		if($sql->rowCount() > 0){
			return true;
		}else{
			return false;
		}
	}
	public function excluiL($id){
		$sql = $this->conexao->prepare("DELETE FROM port_local WHERE id_local = ?");
		$sql->execute(array($id));

		if ($sql->rowCount() > 0) {
			return true;
		}else{
			return false;
		}
	}
}