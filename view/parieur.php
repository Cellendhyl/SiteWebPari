<!DOCTYPE html>
<html lang="fr">
<head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/style.css"> 
        <link rel="stylesheet" href="../css/all.min.css">
        <script defer src="../Controler/app.js"></script>
        <title>Document</title>
    </head> 
    <body>
    

    <?php
        require("../Controler/isSetConnect.php");
        require("../Controler/connexionBDD.php");
        require("../Models/Parieur.class.php");
    ?>

    <section class="top-page">

        <header class="header">
            <nav class="nav">
                <li><a>BONJOUR <?php echo $_SESSION["LOGIN"];?><a></li>
                <li><a href="accueil.php"><i class="fas fa-home"></i></a></li>
                <li><a href=validation.php?afaire=deconnexion><i class="fas fa-door-open"></i></a></li>
            </nav>
        </header>

        <div class="header-bottom">
            <a class="button" href="Recherche.php">RECHERCHER</a>
        </div>
    </section>



<div>
<h2 class="section-title">Votre Profils </h2>
<?php

$q = $db-> query("SELECT * FROM Parieur WHERE id_parieur ='".$_SESSION['ID']."'");
while ($parieur = $q -> fetch())
{
    $m = new Parieur();
    $m->create($parieur['nom'],$parieur['prenom'],$parieur['age'],$parieur['identifiant']);
    echo $m->__toSring();
    echo "<br>date d'inscription :".$parieur['inscription']; 
}        
?>  
</div>

</body>
   
</html>