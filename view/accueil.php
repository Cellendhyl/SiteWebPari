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
        
<section class="top-page">
        <header class="header">
            <nav class="nav">
                <?php session_start(); 
                if (isset($_SESSION["CONNECT"])) {
                    echo '<li><a href=validation.php?afaire=deconnexion><i class="fas fa-door-open"></i></a></li>';
                    echo '<li><a href="accueilUser.php"><i class="fas fa-address-card"></i></a></li>';
                }
                else if (isset($_SESSION["CONNECTADMIN"]))
                {
                    echo '<li><a href=validation.php?afaire=deconnexion><i class="fas fa-door-open"></i></a></li>';
                    echo '<li><a href="accueilAdmin.php"> <i class="fas fa-address-book"></i></a></li>';
                    echo '<li><a href="accueilUser.php"><i class="fas fa-address-card"></i></a></li>';
                }
                else 
                {
                    echo '<button data-modal-target="#modal"><i class="far fa-user-circle"></i></button>';
                }
                ?>
                <div class="modal" id="modal">
                  <div class="modal-header">
                    <div class="title">Votre identifiant</div>
                    <button data-close-button class="close-button">&times;</button>
                </div>

                <div class="modal-body">
                   
                <table>
                    <th> Usager </th>
                    <form action="../Controler/login.php" method="POST" id="login">
                    <tr>
                        <td><input type="text" name="identifiant" placeholder="Votre identifiant" required/></td>
                    </tr>
                    <tr>
                        <td><input type=password name="mdp" placeholder="Votre mot de passe" required/></td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Se connecter !" name="valider" placeholder=""/></td>
                    </tr>
                    <tr>
                        <td><a href="mdpOublie.php">Mot de passe oublié ?</a></td>
                        <td><a href="inscription.php">Rejoignez-nous</a></td>
                    </tr>
                    <th><?php
                    if(isset($_GET['erreur'])){
                        echo '<p>'.$_GET['erreur'].'<p>';
                    }
                    ?></th>   
                    </form>
                </table>
                    
                </div>
                <script src="../Controler/login.js"></script>
                
                
            </nav>
        <div id="overlay"></div>

        <div class="header-bottom">
            <form action="">
                <input type="search" name="search" id="search" placeholder="Rechercher...">
            </form>
        </div>

        </header>
        <h2 class="big-title">Les Differents sport : </h2>
        <?php
        require("../Controler/connexionBDD.php");

        $reponse = $db->query('SELECT * FROM Sport');
        $reponse->execute();        
        while ($sport = $reponse->fetch())    //fetch() itérateur
        {
            echo "<ul>";
            echo '<li><a class="sport" href="listMatch.php?sport='.$sport['id_sport'].'">'.$sport['nom'].'</a></li>';
            echo "</ul>";
        }
        $reponse->closeCursor();        //fermeture du curseur d'analyse des resultats
        echo "<br>"; 
        ?>
        <div id ="result"></div>
    </body>
    <script src="../Controler/match.js"></script>
</html>

