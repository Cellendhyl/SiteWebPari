<?php

class PariPossible {

    private $_id;
    private $_description;
    private $_cote;
    private $_idSport;

    public function __construc(){}

    public function create($id,$description,$cote,$idSport){
        $this->_id = $id;
        $this->_description = $description;
        $this->_cote = $cote;
        $this->_idSport = $idSport;

    }

    public function getIdPari(){
        return $this->_id;
    }

    public function getDescription(){
        return $this->_description;
    }
    
    public function getCote(){
        return $this->_id;
    }

    public function getIdParis(){
        return $this->_idSport;
    }

    public function setIdPari($id){
        $this->_id = $id;
    }
    public function setDescription($description){
        $this->_description = $description;
    }
    public function setIdSport($idSport){
        $this->_idSport = $idSport;
    }
    public function setCote($cote){
        $this->_cote= $cote;
    }
}

?>