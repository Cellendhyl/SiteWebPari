<?php
require_once("Controler/define.php");
include("Models/match.class.php");
include("Models/DAOMatch.class.php");


$match= new Match();
$match->create(1,1,"Barça ","Real","02-01-2022",null,null,3);
$matchDAO = new DAOMatch($match);
$matchDAO->add();

?>