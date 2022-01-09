<?php 
 session_start(); 
 if (!isset($_SESSION["CONNECT"])&&!isset($_SESSION["ADMINCONNECT"]))
 {
    header('Location:../View/accueil.php');
 }
 

    if (isset($_GET['afaire'])){
        if (isset($_SESSION["ADMINCONNECT"])){
            $erreur="Vous avez été déconnecté du service ";
            unset($_SESSION);
            session_destroy();
            header('Location:../View/accueil.php?erreur= '.$erreur.' ');
        }
        else if (isset($_SESSION["CONNECT"])){
            $erreur="Vous avez été déconnecté du service ";
            unset($_SESSION);
            session_destroy();
            header('Location:../View/accueil.php?erreur= '.$erreur.' ');
        }
    }
        
?>