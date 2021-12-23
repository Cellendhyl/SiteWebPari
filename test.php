<?php
require_once("Controler/define.php");
include("Models/Parieur.class.php");
include("Models/DAOParieur.class.php");


$parieur= new Parieur();
$parieur->create('mb','mb',21,'mb','mb');
$parieurDAO = new DAOParieur($parieur);
$parieurDAO->add();

?>