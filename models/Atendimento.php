<?php
class Atendimento extends model{
	public function qtdAtendimentoVisitante($id_local){
		$array = array();
		$sql = $this->conexao->prepare("
				SELECT COUNT(*) AS c FROM port_atendimento
				WHERE local_id = ?
				AND tipo = 0
				AND status = 1
			");
		$sql->execute(array($id_local));

		if ($sql->rowCount() > 0) {
			$array = $sql->fetch();
		}

		return $array['c'];
	}
	public function qtdExtraviadoVisitante($id_local){
		$array = array();
		$sql = $this->conexao->prepare("
				SELECT COUNT(*) AS c FROM port_atendimento
				WHERE data_saida IS NULL
				AND tipo = 0
				AND local_id = ?
			");
		$sql->execute(array($id_local));

		if ($sql->rowCount() > 0) {
			$array = $sql->fetch();
		}

		return $array['c'];
	}
	public function qtdAtendimentoProvisorio($id_local){
		$array = array();
		$sql = $this->conexao->prepare("
				SELECT COUNT(*) AS c FROM port_atendimento
				WHERE local_id = ?
				AND tipo = 1
				AND status = 1
			");
		$sql->execute(array($id_local));

		if ($sql->rowCount() > 0) {
			$array = $sql->fetch();
		}

		return $array['c'];
	}
	public function qtdExtraviadoProvisorio($id_local){
		$array = array();
		$sql = $this->conexao->prepare("
				SELECT COUNT(*) AS c FROM port_atendimento
				WHERE data_saida IS NULL
				AND tipo = 1
				AND local_id = ?
			");
		$sql->execute(array($id_local));

		if ($sql->rowCount() > 0) {
			$array = $sql->fetch();
		}

		return $array['c'];
	}
	public function listaAtendimentoVisitante($id_local, $p, $app){
		$offset = ($p - 1)*$app;
		$array = array();
		$sql = $this->conexao->prepare("
				SELECT * FROM port_atendimento
				WHERE local_id = ?
				AND tipo = 0
				AND status = 1
				ORDER BY id_atendimento DESC 
				LIMIT $offset, $app
			");
		$sql->execute(array($id_local));

		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}
	public function listaAtendimentoProvisorio($id_local, $p, $app){
		$offset = ($p - 1)*$app;
		$array = array();
		$sql = $this->conexao->prepare("
			SELECT * FROM port_atendimento 
			WHERE local_id = ?
				AND tipo = 1
				AND status = 1
			ORDER BY id_atendimento DESC 
			LIMIT $offset, $app");
		$sql->execute(array($id_local));

		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}
	public function entregaCracha($id){
		$sql = $this->conexao->prepare("
			UPDATE port_atendimento 
			SET status = 0,
				data_saida = NOW()
			WHERE id_atendimento = ?
		");
		$sql->execute(array($id));

		if ($sql->rowCount() > 0) {
			return true;
		}else{
			return false;
		}
	}
	public function addProvisorio($local, $usuario, $cracha, $nome, $telefone, $documento, $autorizacao, $empresa, $area){
		$sql = $this->conexao->prepare("
			INSERT INTO port_atendimento 
			SET local_id = ?, 
				usuario_id = ?, 
				data_entrada = NOW(),
				cracha = ?, 
				nome_visitante = ?, 
				telefone_visitante = ?,
				cpf_visitante = ?,
				alfa = ?,
				status = 1, 
				tipo = 1, 
				empresa_visitante = ?,
				area = ?
			");
		$sql->execute(array($local, $usuario, $cracha, $nome, $telefone, $documento, $autorizacao, $empresa, $area));

		if($sql->rowCount() > 0){
			return true;
		}else{
			return false;
		}
	}
	public function addVisitante($local, $usuario, $cracha, $nome, $telefone, $documento, $autorizacao, $empresa, $area){
		$sql = $this->conexao->prepare("
			INSERT INTO port_atendimento 
			SET local_id = ?, 
				usuario_id = ?, 
				data_entrada = NOW(),
				cracha = ?, 
				nome_visitante = ?, 
				telefone_visitante = ?,
				cpf_visitante = ?,
				alfa = ?,
				status = 1, 
				tipo = 0, 
				empresa_visitante = ?,
				area = ?
			");
		$sql->execute(array($local, $usuario, $cracha, $nome, $telefone, $documento, $autorizacao, $empresa, $area));

		if($sql->rowCount() > 0){
			return true;
		}else{
			return false;
		}
	}
	public function atendimentosVisitanteHoje($id_local){
		$array = array();
		$sql = $this->conexao->prepare("
				SELECT COUNT(*) AS c FROM port_atendimento
				WHERE local_id = ?
				AND DATE_FORMAT(data_entrada, '%Y %m %d') = DATE_FORMAT(NOW(), '%Y %m %d')
				AND tipo = 0
			");
		$sql->execute(array($id_local));

		if ($sql->rowCount() > 0) {
			$array = $sql->fetch();
		}

		return $array['c'];
	}
	public function atendimentosProvisorioHoje($id_local){
		$array = array();
		$sql = $this->conexao->prepare("
				SELECT COUNT(*) AS c FROM port_atendimento
				WHERE local_id = ?
				AND DATE_FORMAT(data_entrada, '%Y %m %d') = DATE_FORMAT(NOW(), '%Y %m %d')
				AND tipo = 1
			");
		$sql->execute(array($id_local));

		if ($sql->rowCount() > 0) {
			$array = $sql->fetch();
		}

		return $array['c'];
	}
	public function atendimentosVisitanteMes($id_local){
		$array = array();
		$sql = $this->conexao->prepare("
				SELECT COUNT(*) AS c FROM port_atendimento
				WHERE local_id = ?
				AND DATE_FORMAT(data_entrada, '%Y %m') = DATE_FORMAT(NOW(), '%Y %m')
				AND tipo = 0
			");
		$sql->execute(array($id_local));

		if ($sql->rowCount() > 0) {
			$array = $sql->fetch();
		}

		return $array['c'];
	}
	public function atendimentosProvisorioMes($id_local){
		$array = array();
		$sql = $this->conexao->prepare("
			SELECT COUNT(*) AS c FROM port_atendimento
			WHERE local_id = ?
			AND DATE_FORMAT(data_entrada, '%Y %m') = DATE_FORMAT(NOW(), '%Y %m')
			AND tipo = 1
		");
		$sql->execute(array($id_local));

		if ($sql->rowCount() > 0) {
			$array = $sql->fetch();
		}

		return $array['c'];
	}
	public function emUso($id_local){
		$array = array();
		$sql = $this->conexao->prepare("
			SELECT COUNT(*) AS c FROM port_atendimento
			WHERE local_id = ?
			AND status = 1
		");
		$sql->execute(array($id_local));

		if ($sql->rowCount() > 0) {
			$array = $sql->fetch();
		}

		return $array['c'];
	}
	public function totalCracha($id_local){
		$array = array();
		$sql = $this->conexao->prepare("
			SELECT count(DISTINCT cracha) AS c FROM port_atendimento
			WHERE local_id = ?
		");
		$sql->execute(array($id_local));

		if ($sql->rowCount() > 0) {
			$array = $sql->fetch();
		}

		return $array['c'];
	}
	public function buscaProvisorio($cracha, $id_local){
		$array = array();
		$sql = $this->conexao->prepare("SELECT * FROM port_atendimento WHERE cracha LIKE :cracha AND status = 1 AND local_id = :id_local AND tipo = 1 ORDER BY id_atendimento DESC");
		$sql->bindValue(":cracha", $cracha.'%');
		$sql->bindValue(":id_local", $id_local);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
			return $array;
		}else{
			return false;
		}
	}
	public function qtdbuscadoP($cracha, $id_local){
		$array = array();
		$sql = $this->conexao->prepare("SELECT COUNT(*) AS c FROM port_atendimento WHERE cracha LIKE :cracha AND status = 1 AND local_id = :id_local AND tipo = 1 ORDER BY id_atendimento DESC");
		$sql->bindValue(":cracha", $cracha.'%');
		$sql->bindValue(":id_local", $id_local);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetch();
		}

		return $array['c'];
	}
	public function buscaVisitante($cracha, $id_local){
		$array = array();
		$sql = $this->conexao->prepare("SELECT * FROM port_atendimento WHERE cracha LIKE :cracha AND status = 1 AND local_id = :id_local AND tipo = 0 ORDER BY id_atendimento DESC");
		$sql->bindValue(":cracha", $cracha.'%');
		$sql->bindValue(":id_local", $id_local);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
			return $array;
		}else{
			return false;
		}
	}
	public function qtdbuscadoV($cracha, $id_local){
		$array = array();
		$sql = $this->conexao->prepare("SELECT COUNT(*) AS c FROM port_atendimento WHERE cracha LIKE :cracha AND status = 1 AND local_id = :id_local AND tipo = 0 ORDER BY id_atendimento DESC");
		$sql->bindValue(":cracha", $cracha.'%');
		$sql->bindValue(":id_local", $id_local);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetch();
		}

		return $array['c'];
	}
	public function qtdRelatorioProvisorio($id_local){
		$array = array();
		$sql = $this->conexao->prepare("
				SELECT COUNT(*) AS c FROM port_atendimento
				WHERE local_id = ?
				AND tipo = 1
				AND status = 1
			");
		$sql->execute(array($id_local));

		if ($sql->rowCount() > 0) {
			$array = $sql->fetch();
		}

		return $array['c'];
	}
	public function listaRelatorioProvisorio($id_local){
		$sql = $this->conexao->prepare("
			SELECT * FROM port_atendimento 
			WHERE local_id = ?
				AND tipo = 1
				AND status = 1
			ORDER BY id_atendimento DESC
		");
		$sql->execute(array($id_local));

		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}
	public function qtdRelatorioVisitante($id_local){
		$array = array();
		$sql = $this->conexao->prepare("
				SELECT COUNT(*) AS c FROM port_atendimento
				WHERE local_id = ?
				AND tipo = 0
				AND status = 1
			");
		$sql->execute(array($id_local));

		if ($sql->rowCount() > 0) {
			$array = $sql->fetch();
		}

		return $array['c'];
	}
	public function listaRelatorioVisitante($id_local){
		$sql = $this->conexao->prepare("
			SELECT * FROM port_atendimento 
			WHERE local_id = ?
				AND tipo = 0
				AND status = 1
			ORDER BY id_atendimento DESC
		");
		$sql->execute(array($id_local));

		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}
}