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
                $sql = $this->connexion->prepare("INSERT INTO Matchs (equipe1,equipe2,date,vainqueur,cote,score,id_sport) VALUES(:equipe1,:equipe2,:date,:vainqueur,:cote,:score,:id_sport)");
                $res = $sql -> execute([
                    ':equipe1'=> $this->match->get_e1(), 
                    ':equipe2'=>$this->match->get_e2(),
                    ':date'=>$this->match->get_date(),
                    ':vainqueur'=>$this->match->get_vainqueur(),
                    ':cote'=>$this->match->get_cote(),
                    ':score'=>$this->match->get_score(),
                    ':id_sport'=>$this->match->get_idSport()
                ]);
                
                $id = $this->connexion->lastInsertId();
                $this->match->set_id_match($id);
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
                ':id_match'=>$this->match->get_id_match()
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
                $sql = $this->connexion->prepare("UPDATE Matchs SET id_match=:id_match, id_sport=:id_sport, equipe1=:equipe1, equipe2=:equipe2, date=:date, vainqueur=:vainqueur,score =:score, cote=:cote WHERE id_match=:id_match ");
                $res = $sql -> execute([
                    ':id_match'=>$this->Matchs->get_idMatch(),
                    ':id_sport'=>$this->match->get_idSport(),
                    ':equipe1'=> $this->match->get_e1(), 
                    ':equipe2'=>$this->match->get_e2(),
                    ':date'=>$this->match->get_date(),
                    ':vainqueur'=>$this->match->get_vainqueur(),
                    ':score'=>$this->match->get_score(),
                    ':cote'=>$this->match->get_cote()
                ]);
                $this->connexion = null;
                return $res;
            }catch (PDOException $e){
                print "Erreur !: " . $e->getMessage() . "<br/>";
                die();
            }
          }
    }