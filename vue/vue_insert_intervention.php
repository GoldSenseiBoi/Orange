<h3> Ajout d'une intervention </h3>
<form method="post">
	<table>
		<tr>
			<td> Description </td>
			<td>
				<textarea name="description" rows="4" cols="40"></textarea>

			</td>
		</tr>

		<tr>
			<td> Prix Inter </td>
			<td><input type="text" name="prixInter"></td>
		</tr>

		<tr>
			<td> Date Inter</td>
			<td><input type="date" name="dateInter"></td>
		</tr>

		<tr>
			<td> Produit </td>
			<td>
				<select name="idproduit">
				<?php
					foreach ($lesProduits as $unProduit) {
					echo "<option value='".$unProduit['idproduit']."'>"; 
						echo $unProduit['designation']; 
						echo "</option>"; 
					}
					?>	 
				</select>
			</td>
		</tr>
		<tr>
			<td> Technicien </td>
			<td>
				<select name="idtechnicien">
					<?php
					foreach ($lesTechniciens as $unTechnicien) {
					echo "<option value='".$unTechnicien['idtechnicien']."'>"; 
						echo $unTechnicien['nom']; 
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