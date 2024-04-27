<h3> Ajout d'un produit </h3>
<form method="post">
	<table>
		<tr>
			<td> Désignation </td>
			<td><input type="text" name="designation"></td>
		</tr>

		<tr>
			<td> Prix Achat </td>
			<td><input type="text" name="prixAchat"></td>
		</tr>

		<tr>
			<td> Date Achat</td>
			<td><input type="date" name="dateAchat"></td>
		</tr>

		<tr>
			<td> Catégorie</td>
			<td>
				<select name="categorie">
					<option value="Téléphone">Téléphone</option>
					<option value="Informatique">Informatique</option>
					<option value="Télévision">Télévision</option>
				</select>
			</td>
		</tr>

		<tr>
			<td> Le Client</td>
			<td>
				<select name="idclient">
					<?php
					foreach ($lesClients as $unClient) {
					echo "<option value='".$unClient['idclient']."'>"; 
						echo $unClient['nom']; 
						echo "</option>"; 
					}
					?>
				</select>
			</td>
		</tr>

		<tr>
			<td> </td>
			<td>
				<input type="reset" name="Annuler" value="Annuler">
				<input type="submit" name="Valider" value="Valider">
			</td>
		</tr>

	</table>
</form>