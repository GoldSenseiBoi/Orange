<h3> Liste des produits </h3>
<form method="post"> 
	Filtrer par : <input type="text" name="filtre">
	<input type="submit" name="Filtrer" value="Filtrer">
</form>
<br>
<table border="1">
	<tr>
		<td> Id Produit </td>
		<td> Désignation  </td>
		<td> Prix d'achat </td>
		<td> Date d'achat </td>
		<td> Catégorie </td>
		<td> Id Client </td> 
	</tr>
	<?php
	if (isset($lesProduits)){
		foreach ($lesProduits as $unProduit) {
			echo "<tr>"; 
			echo "<td>".$unProduit['idproduit']."</td>"; 
			echo "<td>".$unProduit['designation']."</td>";
			echo "<td>".$unProduit['prixAchat']."</td>";
			echo "<td>".$unProduit['dateAchat']."</td>";
			echo "<td>".$unProduit['categorie']."</td>";
			echo "<td>".$unProduit['idclient']."</td>";
			echo "</tr>"; 
		}
	}
	?>
</table>