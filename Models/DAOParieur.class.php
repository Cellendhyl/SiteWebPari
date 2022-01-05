<?php


class DAOParieur{
  private $parieur;
  private $connexion;
  
  public function __construct($a) {
    $this->parieur = $a;
	$this->connexion = null;
  }
  
  public function connect(){
	  
	try{
		$this->connexion = new PDO("mysql:host=" . PDO_HOST . ";"."dbname=" . PDO_DBBASE, PDO_USER, PDO_PW);
	}catch (PDOException $e){
		print "Erreur !: " . $e->getMessage() . "<br/>";
		die();
	}  	  
  }

  public function getParieur() {
     return $this->parieur;
  }

  
  
  public function setParieur($a) {
       $this->parieur = $a;
  }
  //version simplifiée d'une dao avec une méthode add et des parametres nommés et bindValue
  public function add() {
	try{
		$this->connect();
		$options = [
			'cost' => 12,
		];
		$password = password_hash($this->parieur->getMdp(), PASSWORD_BCRYPT, $options);
		$this->parieur->setCapital(10000);
		$sql = $this->connexion->prepare("INSERT INTO Parieur (nom,prenom,age,identifiant,mdp,capital) VALUES(:nom,:prenom,:age,:identifiant,:mdp,:capital)");
		$res = $sql -> execute([
    	':nom'=> $this->parieur->getNom(), 
    	':prenom'=> $this->parieur->getPrenom(),
    	':age'=>$this->parieur->getAge(),
    	':identifiant'=> $this->parieur->getIdentifiant(), 
    	':mdp'=>$password,
    	':capital'=>$this->parieur->getCapital()
    	]);
		$id = $this->connexion->lastInsertId();
		$this->parieur->setIdParieur($id);
		$this->connexion = null;
		return $res;
	}catch (PDOException $e){
		print "Erreur !: " . $e->getMessage() . "<br/>";
		die();
	}
	
  }
  
   public function delete() {
      
	try{
		$this->connect();
		$query = " delete from Parieur where id_parieur=:id "; 
		$data = array( 
		':id'=>$this->parieur->getIdParieur()
		);
		$sth = $this->connexion->prepare( $query );
		$res=$sth->execute( $data );
		$this->connexion = null;
		return $res;
	}catch (PDOException $e){
		print "Erreur !: " . $e->getMessage() . "<br/>";
		die();
	}
  }
  
     public function update() {
      
	try{
		$this->connect();
		$options = [
			'cost' => 12,
		];
		$sql = $this->connexion->prepare("UPDATE Parieur SET nom=:nom, prenom=:prenom, age=:age, identifiant=:identifiant, mdp=:mdp, capital=:capital WHERE id_parieur=:id ");
		$res = $sql -> execute([
			':id'=>$this->parieur->getIdParieur(),
    		':nom'=> $this->parieur->getNom(), 
    		':prenom'=> $this->parieur->getPrenom(),
    		':age'=>$this->parieur->getAge(),
    		':identifiant'=> $this->parieur->getIdentifiant(), 
    		':mdp'=> $this->parieur->getMdp(),
    		':capital'=>$this->parieur->getCapital()
    	]);
		$this->connexion = null;
		return $res;
	}catch (PDOException $e){
		print "Erreur !: " . $e->getMessage() . "<br/>";
		die();
	}
  }
  
    
  
   
}


?>