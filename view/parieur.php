<!DOCTYPE html>
<html lang="fr">
<head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/style2.css"> 
        <link rel="stylesheet" href="../css/all.min.css">
        <script defer src="../Controler/app.js"></script>
        <title>Document</title>
    </head> 
    <body>
    

    <?php
        require("../Controler/isSetConnect.php");
        require("../Controler/connexionBDD.php");
        require("../Models/Parieur.class.php");
        require("../Models/PariUser.php");
    ?>

    <section class="top-page">

        <header class="header">
            <nav class="nav">
                <li><a>Bonjour <?php echo $_SESSION["LOGIN"];?><a></li>
                <li><a href="accueil.php"><i class="fas fa-home"></i></a></li>
                <li><a href=../Controler/deconnexion.php?afaire=deconnexion><i class="fas fa-door-open"></i></a></li>
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
$parieur = $q->fetch();

    $p = new Parieur();
    $p->create($parieur['nom'],$parieur['prenom'],$parieur['age'],$parieur['identifiant'],$parieur['mdp']);
    $p->setCapital($parieur['capital']);
    $result = $p->__toString();
    echo $result;
    echo "<br>date d'inscription :".$parieur['inscription'];

    ?>

    <form method="post" action="../Controler/supprimerPari.php" id="listPari">
        <select  name="pari" id="pari">     
            <option value="">--List de vos Paris--</option>
    <?php
    echo '<br>liste des paris : <br>';
$q = $db-> query("SELECT * FROM PariUser WHERE id_parieur ='".$_SESSION['ID']."'");
while ($pariUser = $q -> fetch())
{
    $pUser = new PariUser();
    $pUser->create($pariUser['montant'],$pariUser['gain'],$_SESSION['ID'],$pariUser['id_pari'],$pariUser['id_match']);
    echo '<option value="'.$pariUser['id_pariUser'].'">montant : '.$pUser->getMontant() .'  et   gain : '.$pUser->getGain().'</option>'; 
}   
?>   
    </select>
    <button type="submit" name="supprimer" value="supprimer">Supprimer le pari</button>

</form>
    <br> 
    <div id ="result2"></div>
</div>
</body>
<script src="../Controler/supprimerPari.js"></script>
<?php
if(isSet($_GET['notif'])){
    echo '<br>'.$_GET['notif'].'<br>'; 
}
?>
</html>