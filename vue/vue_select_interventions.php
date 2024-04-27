<h3> Liste des interventions </h3>
<form method="post"> 
	Filtrer par : <input type="text" name="filtre">
	<input type="submit" name="Filtrer" value="Filtrer">
</form>
<br>
<table border="1">
	<tr>
		<td> Id Intervention </td>
		<td> Description  </td>
		<td> Prix Inter </td>
		<td> Date Inter </td>
		<td> Id Produit </td>
		<td> Id Technicien </td> 
	</tr>
	<?php
	if (isset($lesInterventions)){
		foreach ($lesInterventions as $uneInter) {
			echo "<tr>"; 
			echo "<td>".$uneInter['idinter']."</td>"; 
			echo "<td>".$uneInter['description']."</td>";
			echo "<td>".$uneInter['prixInter']."</td>";
			echo "<td>".$uneInter['dateInter']."</td>";
			echo "<td>".$uneInter['idproduit']."</td>";
			echo "<td>".$uneInter['idtechnicien']."</td>";
			echo "</tr>"; 
		}
	}
	?>
</table>