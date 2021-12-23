<?php
$options = [
    'cost' => 12,
];
$password1 = password_hash('admin', PASSWORD_BCRYPT, $options);
$sql = $db->prepare("INSERT INTO Admin (identifiant,mdp) VALUES(:identifiant,:mdp)");
$sql -> execute([
        ':identifiant' => 'admin',
        ':mdp' => $password1
    ]);
?>