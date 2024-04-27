<?php
	require_once ("modele/modele.class.php"); 
	class Controleur{
		private $unModele ; 

		public function __construct (){
			$this->unModele = new Modele (); 
		}

		/************ Gestion des clients ***********/
		public function insertClient ($tab){
			//on controle les données : vides 
			$this->unModele->insertClient ($tab);
		}
		public function selectAllClients (){
			return $this->unModele->selectAllClients(); 
		}
		public function selectLikeClients ($filtre){
			return $this->unModele->selectLikeClients($filtre);
		}
		public function deleteClient($idclient){
			$this->unModele->deleteClient($idclient);
		}
		public function selectWhereClient($idclient){
			return $this->unModele->selectWhereClient($idclient); 
		}
		public function updateClient($tab){
			$this->unModele->updateClient($tab); 
		}

		/************ Gestion des techniciens ***********/
		public function insertTechnicien ($tab){
			//on controle les données : vides 
			$this->unModele->insertTechnicien ($tab);
		}
		public function selectAllTechniciens (){
			return $this->unModele->selectAllTechniciens(); 
		}

		/************ Gestion des Produits ***********/
		public function insertProduit ($tab){
			//on controle les données : vides 
			$this->unModele->insertProduit ($tab);
		}
		public function selectAllProduits (){
			return $this->unModele->selectAllProduits(); 
		}
		public function selectProduitsClients($idclient)
		{
			return $this->unModele->selectProduitsClients($idclient);
		}

		public function count($table){
			return  $this->unModele->count($table);

			}
		public function verifConnexion($email, $mdp){
			//ici : nous vérifions l'email, la compléxité du MDP
			$mdp = sha1($mdp); 
			return $this->unModele->verifConnexion($email, $mdp);
		}

		public function appelProcedure ($nomP, $tab){
			$this->unModele->appelProcedure($nomP, $tab);
		}
	}
?>




