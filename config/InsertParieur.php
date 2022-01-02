<?php

include("../Models/Parieur.class.php");
include("../Models/DAOParieur.class.php");

$p1 = new Parieur();
$p1->create('Burgevin','Mathias',21,'mb123','mb123');
$p2 = new Parieur();
$p2->create('Courtois','Simon',22,'sc123','sc123');
$DAOp = new DAOParieur($p1);
$DAOp->add();
$DAOp->setParieur($p2);
$DAOp->add();

?>