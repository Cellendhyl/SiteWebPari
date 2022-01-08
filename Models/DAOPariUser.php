<?php


class DAOPariUser{
  private $pariUser;
  private $connexion;
  
  public function __construct($pu) {
    $this->pariUser = $pu;
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

  public function getpariUser() {
    return $this->pariUser;
 }
 
 public function setpariUser($pu) {
      $this->pariUser = $pu;
 }

 public function add() {
	try{
		$this->connect();
		$sql = $this->connexion->prepare("INSERT INTO PariUser (montant,gain,id_parieur,id_pari,id_match) VALUES(:montant,:gain,:id_parieur,:id_pari,:id_match)");
		$res = $sql -> execute([
    	':montant'=> $this->pariUser->getMontant(),
        ':gain'=> $this->pariUser->getGain(),
		':id_parieur'=> $this->pariUser->getId_Parieur(),
        ':id_pari'=> $this->pariUser->getId_Pari(),
        ':id_match'=> $this->pariUser->getId_Match()
    	]);
		$id = $this->connexion->lastInsertId();
		$this->pariUser->setIdPari($id);
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
		    $query = " delete from PariUser where id_pariUser=:id "; 
		    $data = array( 
		        ':id'=>$this->pariUser->getId_PariUser()
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
		    $sql = $this->connexion->prepare("UPDATE PariUser SET montant=:montant,gain=:gain,id_parieur=:id_parieur,id_pari=:id_pari,id_match=:id_match WHERE id_pariUser=:id_pariUser ");
		    $res = $sql -> execute([
				':id_pariUser'=>$this->pariUser->getId_PariUser(),
			    ':montant'=> $this->pariUser->getMontant(),
        		':gain'=> $this->pariUser->getGain(),
				':id_parieur'=> $this->pariUser->getId_Parieur(),
        		':id_pari'=> $this->pariUser->getId_Pari(),
        		':id_match'=> $this->pariUser->getId_Match()
    	    ]);
		    $this->connexion = null;
		    return $res;
	    }catch (PDOException $e){
		    print "Erreur !: " . $e->getMessage() . "<br/>";
		    die();
	    }
    }

	public function ValidationPari($parieur){
		try{
		    $this->connect();
			$bool = false;
		    $sql = $this->connexion->prepare("SELECT * FROM Matchs WHERE id_match =:id_match AND fini=1");
		    $sql -> execute([
        		':id_match'=> $this->pariUser->getId_Match()
    	    ]);
			$match = $sql->fetch();
			$taille =  $sql ->  rowCount();
			if ($taille == 1){
				$bool = true;
				$sql2 = $this->connexion->prepare("SELECT * FROM PariPossible WHERE id_pari =:id_pari");
		    	$sql2 -> execute([
        			':id_pari'=>$this->pariUser->getId_Pari()
    	    	]);
				$pari = $sql2->fetch();

				$capital = $parieur->getCapital();
				if ($this->pariUser->getId_Pari()==1 && $match['vainqueur']==$match['equipe1']){
					$parieur->setCapital($capital + $this->pariUser->getGain());
				}
				else if ($this->pariUser->getId_Pari()==2 && $match['vainqueur']==$match['equipe2']){
					$parieur->setCapital($capital + $this->pariUser->getGain());
				}
				else if ($this->pariUser->getId_Pari()==3 && $match['vainqueur']==null){
					$parieur->setCapital($capital + $this->pariUser->getGain());
				}
				$DAOParieur = new DAOParieur($parieur);
				$DAOParieur->updateCapital();
			}
		    $this->connexion = null;
	    }catch (PDOException $e){
		    print "Erreur !: " . $e->getMessage() . "<br/>";
		    die();
	    }
		return $bool;
	}

	function deletebis(){
	
	}
}

?>