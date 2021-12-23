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
            $this->id_parieur = $idParieur;
            $this->id_pari = $idPari;
            $this->id_match = $idMatch;

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

        public function setIdPariUser(int $id) {
            $this->_id_PariUser = $id;
        }
    
        public function setMontant(int $montant){
            $this->_montant = $montant;
        }
        public function setGain(int $age) {
            $this->_gain = $gain;
        }

        public function setIdParieur(int $idParieur) {
            $this->id_parieur = $idParieur;
        }
        public function setIdMatch(int $idMatch) {
            $this->id_match = $idMatch;
        }
        public function setIdPari(int $idPari) {
            $this->id_pari = $idPari;
        }
    }

?>