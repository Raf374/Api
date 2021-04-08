<?php 


	require_once '../includes/DbOperation.php';

	function isTheseParametersAvailable($params){
	
		$available = true; 
		$missingparams = ""; 
		
		foreach($params as $param){
			if(!isset($_POST[$param]) || strlen($_POST[$param])<=0){
				$available = false; 
				$missingparams = $missingparams . ", " . $param; 
			}
		}
		
		
		if(!$available){
			$response = array(); 
			$response['error'] = true; 
			$response['message'] = 'Parameters ' . substr($missingparams, 1, strlen($missingparams)) . ' missing';
			
		
			echo json_encode($response);
			
		
			die();
		}
	}
	
	
	$response = array();
	

	if(isset($_GET['apicall'])){
		
		switch($_GET['apicall']){
	
			case 'createpersonagem':
				
				isTheseParametersAvailable(array('nome','ator','posto','patente'));
				
				$db = new DbOperation();
				
				$result = $db->createPersonagem(
					$_POST['nome'],
					$_POST['ator'],
					$_POST['posto'],
					$_POST['patente']
				);
				

			
				if($result){
					
					$response['error'] = false; 

					
					$response['message'] = 'Personagem adicionado com sucesso';

					
					$response['Personagens'] = $db->getPersonagens();
				}else{

					
					$response['error'] = true; 

				
					$response['message'] = 'Algum erro ocorreu por favor tente novamente';
				}
				
			break; 
			
		
			case 'getpersonagens':
				$db = new DbOperation();
				$response['error'] = false; 
				$response['message'] = 'Pedido concluído com sucesso';
				$response['heroes'] = $db->getPersonagens();
			break; 
			
			
		
			case 'updatepersonagem':
				isTheseParametersAvailable(array('id','nome','ator','posto','patente'));
				$db = new DbOperation();
				$result = $db->updatePersonagem(
					$_POST['id'],
					$_POST['nome'],
					$_POST['ator'],
					$_POST['posto'],
					$_POST['patente']
				);
				
				if($result){
					$response['error'] = false; 
					$response['message'] = 'Personagem atualizado com sucesso';
					$response['Personagens'] = $db->getPersonagens();
				}else{
					$response['error'] = true; 
					$response['message'] = 'Algum erro ocorreu por favor tente novamente';
				}
			break; 
			
			
			case 'deletepersonagem':

				
				if(isset($_GET['id'])){
					$db = new DbOperation();
					if($db->deleteHero($_GET['id'])){
						$response['error'] = false; 
						$response['message'] = 'Personagem excluído com sucesso';
						$response['personagens'] = $db->getPersonagens();
					}else{
						$response['error'] = true; 
						$response['message'] = 'Algum erro ocorreu por favor tente novamente';
					}
				}else{
					$response['error'] = true; 
					$response['message'] = 'Não foi possível deletar, forneça um id por favor';
				}
			break; 
		}
		
	}else{
		 
		$response['error'] = true; 
		$response['message'] = 'Chamada de API inválida';
	}
	

	echo json_encode($response);
	
	
