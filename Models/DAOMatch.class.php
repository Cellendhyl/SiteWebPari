<?php
 
    class DAOmatch{

        private $match;
        private $connexion;

        public function __construct($m) {
            $this->match = $m;
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

          public function getMatch() {
            return $this->match;
         }
         
         public function set_idMatch($m) {
              $this->match = $m;
         }

          public function add() {
            try{
                $this->connect();
                $sql = $this->connexion->prepare("INSERT INTO Matchs (id_sport,equipe1,equipe2,dates,vainqueur,cote) VALUES(:id_sport,:equipe1,:equipe2,:dates,:vainqueur,:cote)");
                $res = $sql -> execute([
                    ':id_sport'=>$this->Matchs->get_idSport(),
                    ':equipe1'=> $this->Matchs->get_e1(), 
                    ':equipe2'=>$this->Matchs->get_e2(),
                    ':dates'=>$this->Matchs->get_date()
                    ':vainqueur'=>$this->Matchs->get_vainqueur(),
                    ':cote'=>$this->Matchs->get_cote()
                ]);
                $id = $this->connexion->lastInsertId();
                $this->match->set_idMatch($id);
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
                $query = "delete from Matchs where id_match=:id_match"; 
                $data = array( 
                ':id_match'=>$this->Matchs->get_idMatch()
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
                $sql = $this->connexion->prepare("UPDATE Matchs SET id_match=:id_match, id_sport=:id_sport, equipe1=:equipe1, equipe2=:equipe2, dates=:dates, vainqueur=:vainqueur,cote=:cote WHERE id_match=:id_match ");
                echo $this->match->getMatch();
                $res = $sql -> execute([
                    ':id_match'=>$this->Matchs->get_idMatch(),
                    ':id_sport'=>$this->Matchs->get_idSport(),
                    ':equipe1'=> $this->Matchs->get_e1(), 
                    ':equipe2'=>$this->Matchs->get_e2(),
                    ':dates'=>$this->Matchs->get_date()
                    ':vainqueur'=>$this->Matchs->get_vainqueur(),
                    ':cote'=>$this->Matchs->get_cote()
                ]);
                $this->connexion = null;
                return $res;
            }catch (PDOException $e){
                print "Erreur !: " . $e->getMessage() . "<br/>";
                die();
            }
          }
    }