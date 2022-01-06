<?php

include("../Models/Sport.class.php");
include("../Models/DAOSport.class.php");

$s1 = new Sport();
$s1->create('football');
$s2 = new Sport();
$s2->create('basketball');
$s3 = new Sport();
$s3->create('volleyball');
$DAOs = new DAOSport($s1);
$DAOs->add();
$DAOs->setSport($s2);
$DAOs->add();
$DAOs->setSport($s3);
$DAOs->add();

?>