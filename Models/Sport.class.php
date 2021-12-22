<?php

class Sport {

    private $_id;
    private $_nom;

    public function __construc(){}

    public function create($id,$nom){
        $this->_id = $id;
        $this->_nom = $nom;
    }

    public function getIdSport(){
        return $this->_id;
    }

    public function getNom(){
        return $this->_nom;
    }

    public function setIdSport($id){
        $this->_id = $id;
    }
    public function setNom($nom){
        $this->_nom = $nom;
    }
}

?>