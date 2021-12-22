<?php
require_once("config/define.php");
include("Models/Parieur.class.php");
include("Models/DAOParieur.class.php");


$parieur= new Parieur();
$parieur->create(1,"2","1",1,"3","3",10000);
$parieurDAO = new DAOParieur($parieur);
//$parieurDAO->add();
//$parieurDAO->delete();
$parieurDAO->update()
?>