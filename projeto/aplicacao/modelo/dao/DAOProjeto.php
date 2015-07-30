<?php
/*
 * Classe DAO para a Projeto. 
 * Data Access Object que irá fazer operações na tabela Projeto (básica: Insert, Update, Delete e Lista)
 */
class AgendaDAO extends PDOConnectionFactory {
	// irá receber uma conexão
	public $conex = null;
	// constructor
	public function AgendaDAO(){
		$this->conex = PDOConnectionFactory::getConnection();
	}
	// realiza uma inserção
	public function Insere( $projeto ){
		try{
			$stmt = $this->conex->prepare("INSERT INTO Projeto (nome, caminho, dono) VALUES (?, ?, ?)");

			$stmt->bindValue(1, $projeto->getNomeProjeto());
			$stmt->bindValue(2, $projeto->getCaminho());
			$stmt->bindValue(3, $projeto->getCriadoPor());
			// executo a query preparada
			$stmt->execute();
 
			// fecho a conexão
			$this->conex = null;
		// caso ocorra um erro, retorna o erro;
		}catch ( PDOException $ex ){  echo "Erro: ".$ex->getMessage(); }
	}
 
	// realiza um Update
	public function Update( $agenda, $condicao ){
		try{		
			// preparo a query de update - Prepare Statement
			$stmt = $this->conex->prepare("UPDATE agenda SET nome=?, email=?, telefone=? WHERE id=?");
			$this->conex->beginTransaction();
			// valores encapsulados nas variáveis da classe Agenda.
			// sequencia de índices que representa cada valor de minha query
			$stmt->bindValue(1, $projeto->getNomeProjeto());
			$stmt->bindValue(2, $projeto->getCaminho());
			$stmt->bindValue(3, $projeto->getCriadoPor());
			$stmt->bindValue(4, $condicao);
 
			// executo a query preparada
			$stmt->execute();
 
			$this->conex->commit();
 
			// fecho a conexão
			$this->conex = null;
		// caso ocorra um erro, retorna o erro;
		}catch ( PDOException $ex ){  echo "Erro: ".$ex->getMessage(); }		
	}
 
	// remove um registro
	public function Deleta( $id ){
		try{
			// executo a query
			$num = $this->conex->exec("DELETE FROM agenda WHERE id=$id");
			// caso seja execuado ele retorna o número de rows que foram afetadas.
			if( $num >= 1 ){ return $num; } else { return 0; }	
		// caso ocorra um erro, retorna o erro;
		}catch ( PDOException $ex ){  echo "Erro: ".$ex->getMessage(); }
	}
 
	public function Lista($query){
		try{
			if( $query == null ){
				// executo a query
				$stmt = $this->conex->query("SELECT * FROM projeto");
			}else{
				$stmt = $this->conex->query($query);
			}
			// desconecta 
			$this->conex = null;
			// retorna o resultado da query
			return $stmt;
		}catch ( PDOException $ex ){  echo "Erro: ".$ex->getMessage(); }
	}
}