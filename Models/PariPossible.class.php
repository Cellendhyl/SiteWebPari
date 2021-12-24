<?php

class PariPossible {

    private $_id;
    private $_description;
    private $_cote;

    public function __construc(){}

    public function create($id,$description,$cote){
        $this->_id = $id;
        $this->_description = $description;
        $this->_cote = $cote;
    }

    public function getIdPari(){
        return $this->_id;
    }

    public function getDescription(){
        return $this->_description;
    }
    
    public function getCote(){
        return $this->_cote;
    }

    public function setIdPari($id){
        $this->_id = $id;
    }
    public function setDescription($description){
        $this->_description = $description;
    }

    public function setCote($cote){
        $this->_cote= $cote;
    }
}

?>