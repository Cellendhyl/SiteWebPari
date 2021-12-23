<?php

    
    class Admin{

        private $_id;
        private $_identifiant;
        private $_mdp;

    
        public function __construct(){  }

        public function create($id,$identifiant,$mdp){
            $this->_id=$id;
            $this->_identifiant=$identifiant;
            $this->_mdp=$mdp;
        }
        
        public function getIdAdmin(){
            return $this->_id; 
        }

        public function getIdentifiant(){
            return $this->_id_sport; 
        }

        public function getMdp(){
            return $this->_mdp; 
        }

        public function setIdAdmin($id){
            $this->_id = $id;
        }

        public function set_id_sport(string $idsport){
            $this->_id_sport = $idsport;
        }

        public function set_e1(string $e1){
            $this->_titre = $e1;
        }
    }
?>