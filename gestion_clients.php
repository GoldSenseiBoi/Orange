<h2> Gestion des clients </h2>

<?php
if(isset($_SESSION['role']) && $_SESSION['role']=="admin") {
	$leClient = null; 
	if(isset($_GET['action']) && isset($_GET['idclient'])){
		$idclient = $_GET['idclient']; 
		$action = $_GET['action']; 

		switch ($action){
			case "sup" : 
					//$unControleur->deleteClient($idclient) ; 
					$nomP = "deleteClient"; 
					$tab = array($idclient);
					$unControleur->appelProcedure($nomP, $tab);

					break; 
			case "edit" : 
			$leClient=$unControleur->selectWhereClient($idclient);  
			break;
			case "voir" :
				$lesProduits=$unControleur->selectProduitsClients($idclient);
				break;  
		}
	}

	require_once ("vue/vue_insert_client.php"); 

	if(isset($_POST['Valider'])){
		//$unControleur->insertClient($_POST);

		//appel de la procédure stockee 
		$nomP = "insertClient"; 
		$tab = array($_POST['nom'], $_POST['prenom'], 
			$_POST['adresse'], $_POST['email']);
		$unControleur->appelProcedure($nomP, $tab);
	}

	if (isset($_POST['Modifier'])){
		$unControleur->updateClient($_POST); 
		header("Location: index.php?page=2");
	}

} //fin if admin

	if(isset($_POST['Filtrer'])){
		$filtre = $_POST['filtre']; 
		$lesClients = $unControleur->selectLikeClients ($filtre); 
	}else {
		$lesClients = $unControleur->selectAllClients ();
	}

	$nb = $unControleur->count("client")['nb']; 
	echo "<br> Nombre de clients : ".$nb; 
	
	require_once ("vue/vue_select_clients.php");


	if (isset($lesProduits)){
		require_once("vue/vue_select_produits.php");
	}
?>