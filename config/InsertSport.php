<?php

$sql = $db->prepare("INSERT INTO Sport (nom) VALUES(:nom)");
$sql -> execute([
        'nom' => 'Foot',
    ]);
?>