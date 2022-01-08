<?php 

include("../Models/PariPossible.class.php");
include("../Models/DAOPariPossible.class.php");

$p1 = new PariPossible();
$p1->create('equipe1',0);
$p2 = new PariPossible();
$p2->create('equipe2',0);
$p3 = new PariPossible();
$p3->create('nul',0);
$p4 = new PariPossible();
$p4->create('ecart de 1',2);
$p5 = new PariPossible();
$p5->create('ecart de 2',2);
$p6 = new PariPossible();
$p6->create('ecart de 3',3);
$DAOp = new DAOPariPossible($p1);
$DAOp->add();
$DAOp->setPariPossible($p2);
$DAOp->add();
$DAOp->setPariPossible($p3);
$DAOp->add();
$DAOp->setPariPossible($p4);
$DAOp->add();
$DAOp->setPariPossible($p5);
$DAOp->add();
$DAOp->setPariPossible($p6);
$DAOp->add();


?>