<?php
class DAOAParieur{
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

  public function getparieur() {
     return $this->parieur;
  }
  
  public function setparieur($a) {
       $this->parieur = $a;
  }
  //version simplifiée d'une dao avec une méthode add et des parametres nommés et bindValue
  public function add() {
      
	try{
		$this->connect();
		$query = " INSERT INTO parieur values(:id,:rue,:ville,:cp)"; 
		$data = array( 
		':id'=>$this->parieur->getId(),
		':rue'=> $this->parieur->getRue(), 
		':ville'=>$this->parieur->getVille(),
		':cp'=>$this->parieur->getCp()
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
  
   public function delete() {
      
	try{
		$this->connect();
		$query = " delete from parieur where id=:id "; 
		$data = array( 
		':id'=>$this->parieur->getId()
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
		$query = " update parieur set rue=:rue, ville=:ville, cp=:cp where id=:id "; 
		$data = array( 
		':id'=>$this->parieur->getId(),
		':rue'=> $this->parieur->getRue(), 
		':ville'=>$this->parieur->getVille(),
		':cp'=>$this->parieur->getCp()
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
  
    
  
   
}


?>