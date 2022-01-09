<?php


include("../Models/Parieur.class.php");
include("../Models/DAOParieur.class.php");
include("../Models/Admin.class.php");
include("../Models/DAOAdmin.class.php");

$p1 = new Parieur();
$p1->create('Burgevin','Mathias',21,'mb123','mb123');
$p2 = new Parieur();
$p2->create('Courtois','Simon',22,'sc123','sc123');
$DAOp = new DAOParieur($p1);
$DAOp->add();
$DAOp->setParieur($p2);
$DAOp->add();


$a1 = new Admin();
$a1->create('mb123','mb123');
$a2 = new Admin();
$a2->create('sc123','sc123');
$DAOa = new DAOAdmin($a1);
$DAOa->add();
$DAOa->setAdmin($a2);
$DAOa->add();
?>