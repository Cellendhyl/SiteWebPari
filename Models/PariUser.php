<?php
 
    class PariUser{

        private $_id_PariUser;
        private $_montant;
        private $_gain;
        private $_id_parieur;
        private $_id_pari ;
        private $_id_match;

        public function __contruct(){
        
        }
    
        public function create($montant,$gain,$idParieur,$idPari,$idMatch){
            $this->_id_PariUser = 0;
            $this->_montant = $montant;
            $this->_gain = $gain;
            $this->_id_parieur = $idParieur;
            $this->_id_pari = $idPari;
            $this->_id_match = $idMatch;

        }

        public function getIdParieur() {
            return $this->_id_parieur;
        }

        public function getIdpari() {
            return $this->_id_pari;
        }

        public function getIdmatch() {
            return $this->_id_match;
        }

        public function getId_PariUser(){
            return $this->_idPariUser;
        }
    
        public function getMontant() {
           return $this->_montant;
        }
    
        public function getGain() {
            return $this->_gain;
        }

        public function setIdPariUser($id) {
            $this->_id_PariUser = $id;
        }
    
        public function setMontant($montant){
            $this->_montant = $montant;
        }
        public function setGain($age) {
            $this->_gain = $gain;
        }

        public function setIdParieur($idParieur) {
            $this->id_parieur = $idParieur;
        }
        public function setIdMatch($idMatch) {
            $this->id_match = $idMatch;
        }
        public function setIdPari($idPari) {
            $this->id_pari = $idPari;
        }
    }

?>