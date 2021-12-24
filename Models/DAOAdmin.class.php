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
		$options = [
			'cost' => 12,
		];
		$password = password_hash($this->admin->getMdp(), PASSWORD_BCRYPT, $options);
		$sql = $this->connexion->prepare("INSERT INTO Admin (identifiant,mdp) VALUES(:identifiant,:mdp)");
		$res = $sql -> execute([
    	':identifiant'=> $this->admin->getIdentifiant(),
        ':mdp'=> $password
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
			$options = [
				'cost' => 12,
			];
			$password = password_hash($this->admin->getMdp(), PASSWORD_BCRYPT, $options);
		    $sql = $this->connexion->prepare("UPDATE admin SET identifiant=:identifiant,mdp=:mdp WHERE id_admin=:id ");
		    $res = $sql -> execute([
			    ':id'=>$this->admin->getIdAdmin(),
				':identifiant'=> $this->admin->getIdentifiant(),
				':mdp'=> $password
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