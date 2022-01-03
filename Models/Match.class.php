<?php

    
    class Match{

        private $_id_match;
        private $_id_sport;
        private $_equipe1;
        private $_equipe2;
        private $_date;
        private $_vainqueur;
        private $_score;
        private $_cotev1;
        private $_cotev2;
        private $_coteNul;
    
        public function __construct(){

        }
        public function create($idsport,$e1,$e2,$date,$cotev1,$cotev2,$coteNul){

            $this->_id_match=0;
            $this->_id_sport=$idsport;
            $this->_equipe1=$e1;
            $this->_equipe2=$e2;
            $this->_date=$date;
            $this->_vainqueur="";
            $this->_cotev1=$cotev1;
            $this->_cotev2=$cotev2;
            $this->_coteNul=$coteNul;
            $this->_score = "";
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

        public function get_score(){
            return $this->_score;
        }

        public function get_cotev1(){
            return $this->_cotev1;
        }
        public function get_cotev2(){
            return $this->_cotev2;
        }
        public function get_coteNul(){
            return $this->_coteNul;
        }

        public function set_id_match( $idmatch){
            $this->_id_match = $idmatch;
        }

        public function set_id_sport( $idsport){
            $this->_id_sport = $idsport;
        }

        public function set_e1(string $e1){
            $this->_equipe1 = $e1;
        }

        public function set_e2(string $e2){
            $this->_equipe2 = $e2;
        }

        public function set_date(string $date){
            $this->_date = $date;
        }

        public function set_vainqueur(string $vainqueur){
            $this->_vainqueur = $vainqueur;
        }

        public function set_score(string $score){
            $this->_score = $score;
        }

        public function set_cotev1(int $cotev1){
            $this->_cotev1 = $cotev1;
        }
        public function set_cotev2(int $cotev2){
            $this->_cotev2 = $cotev2;
        }
        public function set_coteNul(int $coteNul){
            $this->_coteNul = $coteNul;
        }

        public function __toString(){
            return " $this->_equipe1 vs $this->_equipe2";
        }
}
?>

