<?php

Class Cadastroip {
	private $pdo;
	public $msgErro = "";
	public function conectar($nome,$host,$usuario,$senha){ 

	try{ 
	global $pdo;
		$pdo = new PDO("mysql:dbname=".$nome.";host=".$host, $usuario, $senha);
	}catch(PDOException $e){
		$msgErro = $e->getMessage();

	}
	}
	public function cadastrar($cep,$bairro,$cidade,$complemento,$dataNascimento,$andress,$estado,$nomeParceiro,$numero,$sexo){
	global $pdo;
		$sql = $pdo->prepare("INSERT INTO cad_parceiro (cep, bairro, cidade, complemento, dataNascimento, endereco, estado, nomeParceiro, numero, sexo, situacao) VALUES (:ce, :ba, :ci, :co, :dt, :an, :es, :np, :nu, :se, 'Ativo')");
		$sql->bindValue(":ce",$cep);
		$sql->bindValue(":ba",$bairro);
		$sql->bindValue(":ci",$cidade);
		$sql->bindValue(":co",$complemento);
		$sql->bindValue(":dt",$dataNascimento);
		$sql->bindValue(":an",$andress);
		$sql->bindValue(":es",$estado);
		$sql->bindValue(":np",$nomeParceiro);
		$sql->bindValue(":nu",$numero);
		$sql->bindValue(":se",$sexo);
		$sql->execute();
		return true;
	}
	public function consulta($pesquisar){
	global $pdo;
		$sql = $pdo->prepare("SELECT nomeParceiro FROM cad_parceiro WHERE $pesquisar= ''");
		$sql->execute();
		$result = $sql->fetchAll(PDO::FETCH_COLUMN);
		
		return true;
	}
}
	?>
