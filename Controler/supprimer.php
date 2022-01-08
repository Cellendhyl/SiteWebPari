<?php
session_start(); 

if (!isset($_SESSION["CONNECT"])&&!isset($_SESSION["ADMINCONNECT"]))
{
    header('Location:../View/accueil.php');
}
require("../Controler/connexionBDD.php");
if(isset($_SESSION["CONNECT"])){
    if(isset($_POST['pari']) ){
        if($_POST['pari'] != 'init'){
            $q = $db->prepare('SELECT * FROM PariUser where id_pariUser =:id_pariUser');
            $q->execute([
                ':id_pariUser' => $_POST['pari']
            ]);
            $montant = $q->fetch();
            $sql = $db->prepare("UPDATE Parieur SET capital=:capital WHERE id_parieur=:id ");
			$res = $sql -> execute([
				':id'=>$_SESSION['ID'],
    			':capital'=>$_SESSION['CAPITAL']+$montant['montant']
    		]);

   
            $reponse = $db->prepare('DELETE FROM PariUser where id_pariUser =:id_pariUser');
            $reponse->execute([
                ':id_pariUser' => $_POST['pari']
            ]);
           
            echo 'Le pari à été supprimé avec succes';
        }
        else {
            echo 'aucun pari selectionné !';
        }
    }
    else {
        header('Location:../View/accueil.php');
    } 
}
?>