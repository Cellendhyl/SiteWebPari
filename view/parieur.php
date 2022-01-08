<!DOCTYPE html>
<html lang="fr">
<head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/style2.css"> 
        <link rel="stylesheet" href="../css/all.min.css">
        <script defer src="../js/app.js"></script>
        <title>Document</title>
</head> 
<body>

    <?php
        require("../Controler/isSetConnect.php");
        require("../Controler/connexionBDD.php");
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

        <form method="post" action="../Controler/supprimer.php" id="listPari">
            <select  name="pari" id="pari">     
            <option value="init">--Liste de vos Paris--</option>
                <?php
                    echo '<br>liste des paris : <br>';
                    $q = $db-> query("SELECT * FROM PariUser WHERE id_parieur ='".$_SESSION['ID']."'");
                    while ($pariUser = $q -> fetch())
                    {
                        echo '<option value="'.$pariUser['id_pariUser'].'">montant : '.$pariUser['montant'] .'  et   gain : '.$pariUser['gain'].'</option>'; 
                    }   
                ?>   
            </select>
            <button type="submit" id="supprimer" name="supprimer" value="supprimer">Supprimer le pari</button>
        </form>
            <div id ="result"></div>
        </section>
        <?php
        if(isSet($_GET['notif'])){
            echo '<br>'.$_GET['notif'].'<br>'; 
        }
    ?>

</body>
<script src="../js/supprimer.js"></script>
   

</html>