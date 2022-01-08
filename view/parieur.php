<!DOCTYPE html>
<html lang="fr">
<head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/style2.css"> 
        <link rel="stylesheet" href="../css/all.min.css">
        <script defer src="../Controler/app.js"></script>
        <script src="../Controler/supprimerPari.js"></script>
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
                <li><a href="accueil.php"><i class="fas fa-home"></i></a></li>
                <li><a href=../Controler/deconnexion.php?afaire=deconnexion><i class="fas fa-door-open"></i></a></li>
            </nav>
        </header>
    </section>



    <section class="middle-page">
        <h2 class="section-title">Votre Profils </h2>

        <?php
            $q = $db-> query("SELECT * FROM Parieur WHERE id_parieur ='".$_SESSION['ID']."'");
            $parieur = $q->fetch();

                echo "<br>Nom : ".$parieur['nom'];
                echo "<br>Prénom : ".$parieur['prenom'];
                echo "<br>Age : ".$parieur['age'];
                echo "<br>Identifiant : ".$parieur['identifiant'];
                echo "<br>Capital : ".$parieur['capital'];
                echo "<br>date d'inscription : ".$parieur['inscription'];
        ?>

        <form method="post" action="../Controler/supprimerPari.php" id="listPari">
            <select  name="pari" id="pari">     
            <option value="">--Liste de vos Paris--</option>
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
            <div id ="result2"></div>
        </section>

</body>

    <?php
        if(isSet($_GET['notif'])){
            echo '<br>'.$_GET['notif'].'<br>'; 
        }
    ?>

</html>