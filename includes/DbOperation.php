<?php
 
class DbOperation
{
    
    private $con;
 
 
    function __construct()
    {
  
        require_once dirname(__FILE__) . '/DbConnect.php';
 
     
        $db = new DbConnect();
 

        $this->con = $db->connect();
    }
	
	
	function createPersonagem($nome, $ator, $posto, $patente){
		$stmt = $this->con->prepare("INSERT INTO personagens (nome, ator, posto, patente) VALUES (?, ?, ?, ?)");
		$stmt->bind_param("ssss", $nome, $ator, $posto, $patente);
		if($stmt->execute())
			return true; 
		return false; 
	}
		
	function getPersonagens(){
		$stmt = $this->con->prepare("SELECT id, nome, ator, posto, patente FROM personagens");
		$stmt->execute();
		$stmt->bind_result($id, $nome, $ator, $posto, $patente);
		
		$personagens = array(); 
		
		while($stmt->fetch()){
			$personagem  = array();
			$personagem['id'] = $id; 
			$personagem['nome'] = $nome; 
			$personagem['ator'] = $ator; 
			$personagem['posto'] = $posto; 
			$personagem['patente'] = $patente; 
			
			array_push($personagens, $personagem); 
		}
		
		return $personagens; 
	}
	
	
	function updatepersonagem($id, $nome, $ator, $posto, $patente){
		$stmt = $this->con->prepare("UPDATE personagens SET nome = ?, ator = ?, posto = ?, patente = ? WHERE id = ?");
		$stmt->bind_param("ssssi", $nome, $ator, $posto, $patente, $id);
		if($stmt->execute())
			return true; 
		return false; 
	}
	
	
	function deletepersonagem($id){
		$stmt = $this->con->prepare("DELETE FROM personagens WHERE id = ? ");
		$stmt->bind_param("i", $id);
		if($stmt->execute())
			return true; 
		
		return false; 
	}
}