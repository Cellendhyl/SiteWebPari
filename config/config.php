<?php
 include '../Controler/define.php';

    try{
        $dbco = new PDO("mysql:host=".PDO_HOST, PDO_USER, PDO_PW);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = "CREATE DATABASE ".PDO_DBBASE;
        $dbco->exec($sql);
        
        echo 'Base de données créée bien créée ! </br>';
    }
    
    catch(PDOException $e){
      echo "Erreur : " . $e->getMessage();
    }
    
    try {
        $db = new PDO("mysql:host=" . PDO_HOST . ";"."dbname=" . PDO_DBBASE, PDO_USER, PDO_PW);
        $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOExcepetion $e){
        echo $e;
    }

$sql = "CREATE TABLE Sport(
    id_sport INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(30) NOT NULL)";
    
    $db->exec($sql);
    echo 'Table bien créée !</br>';
    

   
$sql = "CREATE TABLE Matchs(
    id_match INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    equipe1 VARCHAR(30) NOT NULL,
    equipe2 VARCHAR(30) NOT NULL,
    date VARCHAR(30) NOT NULL,
    vainqueur VARCHAR(255),
    score VARCHAR(255),
    cote INT NOT NULL,
    id_sport INT UNSIGNED NOT NULL,
    FOREIGN KEY (id_sport) REFERENCES Sport(id_sport))";
    
$db->exec($sql);
echo 'Table bien créée !</br>';

$sql = "CREATE TABLE Parieur(
    id_parieur INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(30) NOT NULL,
    prenom VARCHAR(30) NOT NULL,
    age INT(3) NOT NULL,
    identifiant VARCHAR(30) NOT NULL UNIQUE,
    mdp VARCHAR(255) NOT NULL,
    capital INT(10) NOT NULL,
    inscription TIMESTAMP)";

$db->exec($sql);
echo 'Table bien créée !</br>';

$sql = "CREATE TABLE Admin(
    id_admin INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    identifiant VARCHAR(30) NOT NULL UNIQUE,
    mdp VARCHAR(255) NOT NULL)";

$db->exec($sql);
echo 'Table bien créée !</br>';

$sql = "CREATE TABLE PariPossible(
    id_pari INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    description TEXT NOT NULL,
    cote INT NOT NULL)";

$db->exec($sql);
echo 'Table bien créée !</br>';

$sql = "CREATE TABLE PariUser(
    id_pariUser INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    montant INT NOT NULL,
    gain INT NOT NULL, 
    EquipeSelect VARCHAR(50),
    id_parieur INT UNSIGNED NOT NULL,
    id_pari INT UNSIGNED NOT NULL,
    id_match INT UNSIGNED NOT NULL,
    FOREIGN KEY (id_parieur) REFERENCES Parieur(id_parieur),
    FOREIGN KEY (id_pari) REFERENCES PariPossible(id_pari),
    FOREIGN KEY (id_match) REFERENCES Matchs(id_match))";

$db->exec($sql);
echo 'Table bien créée !</br>';

include  'InsertSport.php';
include  'InsertAdmin.php';
include  'InsertMatch.php';

?>