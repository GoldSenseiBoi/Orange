<h3> Liste des clients </h3>
<form method="post"> 
	Filtrer par : <input type="text" name="filtre">
	<input type="submit" name="Filtrer" value="Filtrer">
</form>
<br>
<table border="1">
	<tr>
		<td> Id client </td>
		<td> Nom client </td>
		<td> Prénom client </td>
		<td> Adresse contact </td>
		<td> Email contact </td>
<?php
if(isset($_SESSION['role']) && $_SESSION['role']=="admin") { 
		echo "<td> Opérations </td>"; 
}
?>
	</tr>
	<?php
	if (isset($lesClients)){
		foreach ($lesClients as $unClient) {
			echo "<tr>"; 
			echo "<td>".$unClient['idclient']."</td>"; 
			echo "<td>".$unClient['nom']."</td>";
			echo "<td>".$unClient['prenom']."</td>";
			echo "<td>".$unClient['adresse']."</td>";
			echo "<td>".$unClient['email']."</td>";
if(isset($_SESSION['role']) && $_SESSION['role']=="admin") {
			echo "<td>"; 
			echo "<a href='index.php?page=2&action=sup&idclient=".$unClient['idclient']."'><img src='images/supprimer.png' height='30' width='30'></a>"; 
			echo "<a href='index.php?page=2&action=edit&idclient=".$unClient['idclient']."'><img src='images/editer.png' height='30' width='30'></a>"; 
			echo "<a href='index.php?page=2&action=voir&idclient=".$unClient['idclient']."'><img src='images/voir.png' height='30' width='30'></a>"; 
			echo "</td>";
}
			echo "</tr>"; 
		}
	}
	?>
</table>