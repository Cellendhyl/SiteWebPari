<?php


class DAOAdmin{
  private $admin;
  private $connexion;
  
  public function __construct($p) {
    $this->admin = $p;
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

  public function getAdmin() {
     return $this->admin;
  }
  
  public function setAdmin($p) {
       $this->admin = $p;
  }
  //version simplifiée d'une dao avec une méthode add et des parametres nommés et bindValue
  public function add() {
	try{
		$this->connect();
		$sql = $this->connexion->prepare("INSERT INTO admin (description,cote,id_sport) VALUES(:description,:cote,:id_sport)");
		$res = $sql -> execute([
    	':description'=> $this->admin->getDescription();
        ':cote'=> $this->admin->getCote()
        ':id_sport'=> $this->admin->getIdSport()
    	]);
		$id = $this->connexion->lastInsertId();
		$this->admin->setIdAdmin($id);
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
		    $query = " delete from admin where id_admin=:id "; 
		    $data = array( 
		        ':id'=>$this->admin->getIdAdmin()
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
		    $sql = $this->connexion->prepare("UPDATE admin SET description=:description,cote=:cote,id_sport=:id_sport WHERE id_admin=:id ");
		    $res = $sql -> execute([
			    ':id'=>$this->admin->getIdAdmin(),
    		    ':description'=> $this->admin->getDescription();
                ':cote'=> $this->admin->getCote()
                ':id_sport'=> $this->admin->getIdSport()
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