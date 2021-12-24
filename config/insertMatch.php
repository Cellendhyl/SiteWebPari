<?php


include("../Models/Match.class.php");
include("../Models/DAOMatch.class.php");

$m1 = new Match();
$m1->create(1,'Barça','Real','31-12-2021',2);
$m2 = new Match();
$m2->create(1,'PSG','OM','31-12-2021',3);
$m3 = new Match();
$m3->create(2,'Warrior','Rockets','31-12-2021',3);
$DAOm = new DAOMatch($m1);
$DAOm->add();
$DAOm->setMatch($m2);
$DAOm->add();
$DAOm->setMatch($m3);
$DAOm->add();



?>