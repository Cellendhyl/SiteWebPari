<?php 
 require("isSetConnectAdminouParieur.php");
if (isset($_GET['afaire'])){
       
    $erreur="Vous avez été déconnecté du service ";
    unset($_SESSION);
    session_destroy();
    header('Location:../View/accueil.php?erreur= '.$erreur.' ');
}
        
?>