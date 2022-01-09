<?php
session_start(); 
if (!isset($_SESSION["CONNECT"])&&!isset($_SESSION["CONNECTADMIN"]))
{
    header('Location:../View/accueil.php');
}
?>