<h2> Bienvenue dans votre boutique </h2>

<h4>
	<?php 
	echo "Bonjour, ".$_SESSION['prenom']."  ".$_SESSION['nom']; 

	echo "<br> Vous etes connectes autant que : ".$_SESSION['role'];

	?>

</h4>