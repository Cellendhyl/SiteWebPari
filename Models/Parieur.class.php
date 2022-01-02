<?php 


class Parieur {

    private $_idParieur;
    private $_nom;
    private $_prenom;
    private $_age;
    private $_identifiant;
    private $_mdp;
    private $_capital;

    public function __contruct(){
        
    }

    public function create($nom,$prenom,$age,$identifiant,$mdp){
        $this->_idParieur = 0;
        $this->_capital = 0;
        $this->_nom = $nom;
        $this->_prenom = $prenom;
        $this->_age = $age;
        $this->_identifiant = $identifiant;
        $this->_mdp = $mdp;
    }

    public function getIdParieur(){
        return $this->_idParieur;
    }

    public function getNom() {
       return $this->_nom;
    }

    public function getPrenom() {
        return $this->_prenom;
    }

    public function getAge() {
        return $this->_age;
    }
    public function getIdentifiant() {
        return $this->_identifiant;
    }

    public function getMdp() {
        return $this->_mdp;
    }

    public function getCapital() {
        return $this->_capital;
    }

    public function setIdParieur($id){
        $this->_idParieur = $id;
    }

    public function setNom(string $nom) {
        $this->_nom = $nom;
    }

    public function setPrenom(string $prenom){
        $this->_prenom = $prenom;
    }
    public function setAge(int $age) {
        $this->_age = $age;
    }

    public function setIdentifiant(string $identifiant){
        $this->_identifiant = $identifiant;
    }
    public function setMDP(string $mdp) {
        $this->_mdp = $mdp;
    }

    public function setCapital($capital){
        $this->_capital = $capital;
    }

    public function __toString(){
        return "Voici vos données personnelles </br> Nom : $this->_nom </br> Prenom : $this->_prenom </br>Age : $this->_age </br>Identifiant : $this->_identifiant </br>Capital : $this->_capital </br>";
    }
}
?>
