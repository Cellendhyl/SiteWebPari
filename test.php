<?php
require_once("Controler/define.php");
include("Models/PariPossible.class.php");
include("Models/DAOPariPossible.class.php");


$PariPossible= new PariPossible();
$PariPossible->create(1,"gagne",2);
$PariPossibleDAO = new DAOPari($PariPossible);
$PariPossibleDAO->add()
 

?>

