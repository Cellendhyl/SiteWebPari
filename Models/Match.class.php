<?php

    
    class match{

        private $_id_match;
        private $_id_sport;
        private $_equipe1;
        private $_equipe2;
        private $_date;
        private $_vainqueur;
        private $_cote;

    
        public function __construct(int idmatch,string idsport, string $e1,string $e2,string $date, string $vainqueur , $cote){
            $this->_id_match=$idmatch;
            $this->_id_sport=$idsport;
            $this->_equipe1=$e1;
            $this->_equipe2=$e2;
            $this->_date=$date;
            $this->_vainqueur=$vainqueur;
            $this->_cote=$cote;
        }

        public function __construct(){

        }
        
        public function get_idMatch(){
            return $this->_id_match; 
        }

        public function get_idSport(){
            return $this->_id_sport; 
        }

        public function get_e1(){
            return $this->_equipe1; 
        }

        public function get_e2(){
            return $this->_equipe2;
        }

        public function get_date(){
            return $this->_date; 
        }

        public function get_vainqueur(){
            return $this->_vainqueur; 
        }

        public function get_cote(){
            return $this->_cote;
        }

        public function set_id_match(string $idmatch){
            $this->_id_match = $idmatch;
        }

        public function set_id_sport(string $idsport){
            $this->_id_sport = $idsport;
        }

        public function set_e1(string $e1){
            $this->_titre = $e1;
        }

        public function set_e2(int $e2){
            $this->_id_annonce = $e2;
        }

        public function set_date(int $date){
            $this->_id_categ = $date;
        }

        public function set_vainqueur(int $vainqueur){
            $this->_id_annonce = $vainqueur;
        }

        public function set_cote(int $cote){
            $this->_id_categ = $cote;
        }
