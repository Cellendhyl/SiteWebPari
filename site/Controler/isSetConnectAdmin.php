<?php 
    session_start(); 
    if (!isset($_SESSION["CONNECTADMIN"]))
    {
        header('Location:accueil.php');
    }
?>