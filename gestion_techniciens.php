<h2> Gestion des techniciens </h2>

<?php
	require_once ("vue/vue_insert_technicien.php"); 

	if(isset($_POST['Valider'])){
		$unControleur->insertTechnicien($_POST);
	}

	$lesTechniciens = $unControleur->selectAllTechniciens ();

	require_once ("vue/vue_select_techniciens.php");
?>
