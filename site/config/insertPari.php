<?php 

include("../Models/PariPossible.class.php");
include("../Models/DAOPariPossible.class.php");

$sql = $db->prepare("INSERT INTO paripossible (description,cote) VALUES (:description,:cote)");
$res = $sql-> execute([
    ':description'=> "equipe1",
    ':cote'=> 0
    ]);

$sql = $db->prepare("INSERT INTO paripossible (description,cote) VALUES (:description,:cote)");
$res = $sql-> execute([
    ':description'=> "equipe2",
    ':cote'=> 0
    ]);

$sql = $db->prepare("INSERT INTO paripossible (description,cote) VALUES (:description,:cote)");
$res = $sql-> execute([
    ':description'=> "nul",
    ':cote'=> 0
    ]);

$sql = $db->prepare("INSERT INTO paripossible (description,cote) VALUES (:description,:cote)");
$res = $sql-> execute([
    ':description'=> "ecart de 1",
    ':cote'=> 2
    ]);
$sql = $db->prepare("INSERT INTO paripossible (description,cote) VALUES (:description,:cote)");
	$res = $sql -> execute([
    ':description'=> "ecart de 2",
    ':cote'=> 4
    ]);
$sql = $db->prepare("INSERT INTO paripossible (description,cote) VALUES (:description,:cote)");
$res = $sql -> execute([
    ':description'=> "ecart de 3",
    ':cote'=> 5
    ]);

?>