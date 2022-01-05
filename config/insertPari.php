<?php 

include("../Models/PariPossible.class.php");
include("../Models/DAOPariPossible.class.php");

$p1 = new PariPossible();
$p1->create('equipe1',0);
$p2 = new PariPossible();
$p2->create('equipe2',0);
$p3 = new PariPossible();
$p3->create('nul',0);
$DAOp = new DAOPariPossible($p1);
$DAOp->add();
$DAOp->setPariPossible($p2);
$DAOp->add();
$DAOp->setPariPossible($p3);
$DAOp->add();

?>