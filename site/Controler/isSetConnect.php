<?php 
    session_start(); 
    if (!isset($_SESSION["CONNECT"]))
    {
        header('Location:accueil.php');
    }
?>