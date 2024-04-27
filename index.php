<?php
	session_start();
	require_once("controleur/controleur.class.php"); 
	$unControleur = new Controleur (); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Orange</title>
	<meta charset="utf-8">
</head>
<body>
<center>

	<?php
		if( ! isset($_SESSION['email'])){
			require_once("vue/vue_connexion.php");
		}
		if(isset($_POST['seConnecter'])){
			$email = $_POST['email']; 
			$mdp = $_POST['mdp'];
			$unUser = $unControleur->verifConnexion($email, $mdp); 
			if ($unUser != null){
				$_SESSION['nom'] = $unUser['nom']; 
				$_SESSION['prenom'] = $unUser['prenom']; 
				$_SESSION['email'] = $unUser['email']; 
				$_SESSION['role'] = $unUser['role']; 
				//on recharge la page 
				header("Location: index.php?page=1"); 
			}else {
				echo "<br> Veuillez vérifier vos identifiants."; 
			}
		}
	
	if (isset($_SESSION['email'])){
	echo '
		<h1> Site interventions Orange </h1>
		<a href="index.php?page=1">
			<img src="images/home.jpeg" height="100" width="100">
		</a>
		<a href="index.php?page=2">
			<img src="images/clients.jpeg" height="100" width="100">
		</a>
		<a href="index.php?page=3">
			<img src="images/produits.png" height="100" width="100">
		</a>
		<a href="index.php?page=4">
			<img src="images/techniciens.png" height="100" width="100">
		</a>
		<a href="index.php?page=5">
			<img src="images/interventions.png" height="100" width="100">
		</a>
		<a href="index.php?page=6">
			<img src="images/deconnexion.jpeg" height="100" width="100">
		</a>
		'; 
	
		if(isset($_GET['page'])){
			$page = $_GET['page'];
		}else {
			$page = 1;
		}
		switch ($page){
			case 1 : require_once ("home.php"); break; 
			case 2 : require_once ("gestion_clients.php"); break;
			case 3 : require_once ("gestion_produits.php"); break;
			case 4 : require_once ("gestion_techniciens.php"); break;  
			case 5 : require_once ("gestion_interventions.php"); break;
			case 6 : session_destroy(); 
					 unset($_SESSION['email']); 
					 //on recharge la page index.php 
					 header("Location: index.php");
					 break;
		}
	}
	?>
</center>
</body>
</html>






