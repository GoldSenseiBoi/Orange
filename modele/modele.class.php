<?php
	class Modele {
		private $unPDO ; 
		public function __construct (){
			try{
				$url = "mysql:host=localhost:8889;dbname=orange_efrei"; 
				$user = "root"; 
				$mdp ="root"; 
				$this->unPDO= new PDO ($url, $user, $mdp); 
			}
			catch(PDOException $exp){
				echo "Erreur connexion BDD : ".$exp->getMessage(); 
			}
		}
		/************* Gestion des clients ***************/
		public function insertClient ($tab){
			$requete = "insert into client values (null, :nom, :prenom,:adresse,:email); "; 
			$donnees = array(
						":nom"=>$tab['nom'], 
						":prenom"=>$tab['prenom'],
						":adresse"=>$tab['adresse'],
						":email"=>$tab['email']
							);
			$insert = $this->unPDO->prepare ($requete); 
			$insert->execute ($donnees);
		}
		public function selectAllClients (){
			$requete ="select * from client ;";
			$select = $this->unPDO->prepare ($requete); 
			$select->execute (); 
			return $select->fetchAll(); 
		}

		public function selectLikeClients ($filtre){
			$requete ="select * from client where nom like :filtre or prenom like :filtre or adresse like :filtre or email like :filtre;";
			$donnees=array(":filtre"=>"%".$filtre."%");
			$select = $this->unPDO->prepare ($requete); 
			$select->execute ($donnees); 
			return $select->fetchAll(); 
		}

		public function deleteClient($idclient){
			$requete="delete from client where idclient = :idclient;"; 
			$donnees=array(":idclient"=>$idclient);
			$select = $this->unPDO->prepare ($requete); 
			$select->execute ($donnees); 
		}

		public function selectWhereClient($idclient){
			$requete="select * from client where idclient=:idclient;"; 
			$donnees=array(":idclient"=>$idclient);
			$select = $this->unPDO->prepare ($requete); 
			$select->execute ($donnees);
			return $select->fetch() ; 
		}

		public function updateClient($tab){
			$requete="update client set nom=:nom, prenom= :prenom, adresse=:adresse, email=:email where idclient = :idclient;"; 
			$donnees = array(
						":nom"=>$tab['nom'], 
						":prenom"=>$tab['prenom'],
						":adresse"=>$tab['adresse'],
						":email"=>$tab['email'], 
						":idclient"=>$tab['idclient']
							);
			$update = $this->unPDO->prepare ($requete); 
			$update->execute ($donnees);
		}
		/************* Gestion des techniciens ***************/
		public function insertTechnicien ($tab){
			$requete = "insert into technicien values (null, :nom, :prenom,:specialite,:dateEmbauche); "; 
			$donnees = array(
						":nom"=>$tab['nom'], 
						":prenom"=>$tab['prenom'],
						":specialite"=>$tab['specialite'],
						":dateEmbauche"=>$tab['dateEmbauche']
							);
			$insert = $this->unPDO->prepare ($requete); 
			$insert->execute ($donnees);
		}
		public function selectAllTechniciens (){
			$requete ="select * from technicien ;";
			$select = $this->unPDO->prepare ($requete); 
			$select->execute (); 
			return $select->fetchAll(); 
		}
		/********** Gestion des Produits ***************/
		public function insertProduit ($tab){
			$requete = "insert into produit values (null, :designation, :prixAchat, :dateAchat, :categorie, :idclient); "; 
			$donnees = array(
						":designation"=>$tab['designation'], 
						":prixAchat"=>$tab['prixAchat'],
						":dateAchat"=>$tab['dateAchat'],
						":categorie"=>$tab['categorie'],
						":idclient"=>$tab['idclient']
							);
			$insert = $this->unPDO->prepare ($requete); 
			$insert->execute ($donnees);
		}
		public function selectAllProduits (){
			$requete ="select * from produit ;";
			$select = $this->unPDO->prepare ($requete); 
			$select->execute (); 
			return $select->fetchAll(); 
		}

		public function selectProduitsClients($idclient){
		$requete ="select * from produit where idclient = :idclient;";

		$donnees=array(":idclient"=>$idclient);
		$select = $this->unPDO->prepare ($requete); 
		$select->execute ($donnees);
		return $select->fetchAll(); 
		}

		public function count($table){
			$requete="select count(*) as nb from ".$table; 
			$select = $this->unPDO->prepare ($requete); 
			$select->execute ();
			return $select->fetch();
		}
		public function verifConnexion($email, $mdp){
			$requete ="select * from user where email =:email and mdp = :mdp;"; 
			$donnees=array(":email"=>$email, ":mdp"=>$mdp); 
			$select = $this->unPDO->prepare ($requete); 
			$select->execute ($donnees);
			return $select->fetch();
		}

		public function appelProcedure ($nomP, $tab){
			$chaine = "'".implode("','", $tab)."'"; 
			$requete = "call  ".$nomP."(".$chaine."); ";
			$select = $this->unPDO->prepare ($requete); 
			$select->execute ();
		}
	}
?>






