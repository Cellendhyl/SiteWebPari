<?php


class DAOPari{
  private $pari;
  private $connexion;
  
  public function __construct($p) {
    $this->pari = $p;
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

  public function getpari() {
     return $this->pari;
  }
  
  public function setpari($p) {
       $this->pari = $p;
  }
  //version simplifiée d'une dao avec une méthode add et des parametres nommés et bindValue
  public function add() {
	try{
		$this->connect();
		$sql = $this->connexion->prepare("INSERT INTO pari (description,cote,id_sport) VALUES(:description,:cote,:id_sport)");
		$res = $sql -> execute([
    	':description'=> $this->pari->getDescription();
        ':cote'=> $this->pari->getCote()
        ':id_sport'=> $this->pari->getIdSport()
    	]);
		$id = $this->connexion->lastInsertId();
		$this->pari->setIdPari($id);
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
		    $query = " delete from pari where id_pari=:id "; 
		    $data = array( 
		        ':id'=>$this->pari->getIdPari()
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
		    $sql = $this->connexion->prepare("UPDATE pari SET description=:description,cote=:cote,id_sport=:id_sport WHERE id_pari=:id ");
		    echo $this->pari->getIdpari();
		    $res = $sql -> execute([
			    ':id'=>$this->pari->getIdPari(),
    		    ':description'=> $this->pari->getDescription();
                ':cote'=> $this->pari->getCote()
                ':id_sport'=> $this->pari->getIdSport()
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