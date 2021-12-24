<?php

    
    class Admin{

        private $_id;
        private $_identifiant;
        private $_mdp;

    
        public function __construct(){  }

        public function create($identifiant,$mdp){
            $this->_id=0;
            $this->_identifiant=$identifiant;
            $this->_mdp=$mdp;
        }
        
        public function getIdAdmin(){
            return $this->_id; 
        }

        public function getIdentifiant(){
            return $this->_identifiant; 
        }

        public function getMdp(){
            return $this->_mdp; 
        }

        public function setIdAdmin($id){
            $this->_id = $id;
        }

        public function setMdp($mdp){
            $this->_mdp = $mdp;
        }

        public function setIdentifiant($identifiant){
            $this->_identifiant = $identifiant;
        }
    }
?>