<?php

include("../Models/Sport.class.php");
include("../Models/DAOSport.class.php");

$s1 = new Sport();
$s1->create('Football');
$s2 = new Sport();
$s2->create('Basketball');
$s3 = new Sport();
$s3->create('Handball');
$DAOs = new DAOSport($s1);
$DAOs->add();
$DAOs->setSport($s2);
$DAOs->add();
$DAOs->setSport($s3);
$DAOs->add();

?>