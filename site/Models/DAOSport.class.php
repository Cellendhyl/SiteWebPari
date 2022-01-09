<?php


class DAOSport{
  private $sport;
  private $connexion;
  
  public function __construct($s) {
    $this->sport = $s;
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

  public function getsport() {
     return $this->sport;
  }
  
  public function setsport($s) {
       $this->sport = $s;
  }
  //version simplifiée d'une dao avec une méthode add et des parametres nommés et bindValue
  public function add() {
	try{
		$this->connect();
		$sql = $this->connexion->prepare("INSERT INTO sport (nom) VALUES(:nom)");
		$res = $sql -> execute([
    	':nom'=> $this->sport->getNom()
    	]);
		$id = $this->connexion->lastInsertId();
		$this->sport->setIdSport($id);
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
		$query = " delete from sport where id_sport=:id "; 
		$data = array( 
		':id'=>$this->sport->getIdSport()
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
		$sql = $this->connexion->prepare("UPDATE sport SET nom=:nom WHERE id_sport=:id ");
		$res = $sql -> execute([
			':id'=>$this->sport->getIdSport(),
    		':nom'=> $this->sport->getNom(), 
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