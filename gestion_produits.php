<h2> Gestion des produits </h2>


<?php
	$lesClients = $unControleur->selectAllClients(); 
	require_once ("vue/vue_insert_produit.php"); 


	if (isset($_POST['Valider'])){
		$unControleur->insertProduit($_POST);
	}

	$lesProduits = $unControleur->selectAllProduits(); 
	require_once ("vue/vue_select_produits.php");
?>