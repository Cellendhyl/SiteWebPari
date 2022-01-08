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
         
         public function setMatch($m) {
              $this->match = $m;
         }

          public function add() {
            try{
                $this->connect();
                $sql = $this->connexion->prepare("INSERT INTO Matchs (equipe1,equipe2,date,vainqueur,cotev1,cotev2,coteNul,score,fini,id_sport) VALUES(:equipe1,:equipe2,:date,:vainqueur,:cotev1,:cotev2,:coteNul,:score,:fini,:id_sport)");
                $res = $sql -> execute([
                    ':equipe1'=> $this->match->get_e1(), 
                    ':equipe2'=>$this->match->get_e2(),
                    ':date'=>$this->match->get_date(),
                    ':vainqueur'=>$this->match->get_vainqueur(),
                    ':cotev1'=>$this->match->get_cotev1(),
                    ':cotev2'=>$this->match->get_cotev2(),
                    ':coteNul'=>$this->match->get_coteNul(),
                    ':score'=>$this->match->get_score(),
                    ':fini'=>$this->match->get_fini(),
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
                ':id_match'=>$this->match->get_idMatch()
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
                $sql = $this->connexion->prepare("UPDATE Matchs SET id_match=:id_match, id_sport=:id_sport, equipe1=:equipe1, equipe2=:equipe2, date=:date, vainqueur=:vainqueur,score =:score, cotev1=:cotev1,cotev2=:cotev2,coteNul=:coteNul WHERE id_match=:id_match ");
                $res = $sql -> execute([
                    ':id_match'=>$this->match->get_idMatch(),
                    ':id_sport'=>$this->match->get_idSport(),
                    ':equipe1'=> $this->match->get_e1(), 
                    ':equipe2'=>$this->match->get_e2(),
                    ':date'=>$this->match->get_date(),
                    ':vainqueur'=>$this->match->get_vainqueur(),
                    ':score'=>$this->match->get_score(),
                    ':cotev1'=>$this->match->get_cotev1(),
                    ':cotev2'=>$this->match->get_cotev2(),
                    ':coteNul'=>$this->match->get_coteNul()
                ]);
                $this->connexion = null;
                return $res;
            }catch (PDOException $e){
                print "Erreur !: " . $e->getMessage() . "<br/>";
                die();
            }
          }

          public function fini($vainqueur,$score){
            try{
                $this->connect();
                $sql = $this->connexion->prepare("UPDATE Matchs SET score=:score vainqueur =:vainqueur, fini =:fini WHERE id_match=:id_match ");
                $res = $sql -> execute([
                    ':id_match'=>$this->match->get_idMatch(),
                    ':score'=>$score,
                    ':vainqueur'=>$vainqueur,
                    ':fini'=>1
                ]);
                $this->connexion = null;
                return $res;
            }catch (PDOException $e){
                print "Erreur !: " . $e->getMessage() . "<br/>";
                die();
            }
          }
    }