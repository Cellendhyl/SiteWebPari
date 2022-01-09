<?php
include 'site/Controler/define.php';
try {
        $db = new PDO("mysql:host=" . PDO_HOST . ";"."dbname=" . PDO_DBBASE, PDO_USER, PDO_PW);
        $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       echo  '<script>window.location.href = "site/View/accueil.php";</script>';
    } catch(\PDOExcepetion $e){
        echo $e;
    } ?>
