<?php
 
    class PariUser{

        private _id_PariUser;
        private _montant;
        private _gain;
        private id_parieur;
        private id_pari ;
        private id_match;

        public function __contruct(){
        
        }
    
        public function create($idPariUser,$montant,$gain){
            $this->_id_PariUser = $idPariUser;
            $this->_montant = $montant;
            $this->_gain = $gain;
        }

        public function getIdParieur() {
            return $this->id_parieur;
        }

        public function getIdpari() {
            return $this->id_pari;
        }

        public function getIdmatch() {
            return $this->id_match;
        }

        public function getId_PariUser(){
            return $this->idPariUser;
        }
    
        public function getMontant() {
           return $this->montant;
        }
    
        public function getGain() {
            return $this->gain;
        }

        public function setIdPariUser(string $id) {
            $this->_id_PariUser = $id;
        }
    
        public function setMontant(string $montant){
            $this->_montant = $montant;
        }
        public function setGain(int $age) {
            $this->_gain = $gain;
        }

        public function setGain(int $IDparieur) {
            $this->id_parieur = $IDparieur;
        }
    }

?>