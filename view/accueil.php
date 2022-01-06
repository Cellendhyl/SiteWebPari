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
                    echo '<li><a href=../Controler/deconnexion.php?afaire=deconnexion><i class="fas fa-door-open"></i></a></li>';
                    echo '<li><a href="parieur.php"><i class="fas fa-address-card"></i></a></li>';
                }
                else if (isset($_SESSION["CONNECTADMIN"]))
                {
                    echo '<li><a href=../Controler/deconnexion.php?afaire=deconnexion><i class="fas fa-door-open"></i></a></li>';
                    echo '<li><a href="Admin.php"> <i class="fas fa-address-book"></i></a></li>';
                }
                else 
                {
                    echo '<li><a href="accueil.php"><i class="fas fa-redo-alt"></i></a></li>';
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
                        <td><input type="text" name="identifiant" placeholder="Votre identifiant"  required/></td>
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
                    <th>
                        <div id="erreur"></div>
                   </th>   
                    </form>
                </table>
                    
                </div>
                
                
                
            </nav>
        <div id="overlay"></div>

        <!-- <div class="header-bottom">
            <form action="">
                <input type="search" name="search" id="search" placeholder="Rechercher...">
            </form>
        </div> -->

        </header>
            <?php
                    require("../Controler/connexionBDD.php");
                    $reponse = $db->query('SELECT * FROM Sport');
                    $reponse->execute();     
                    echo "<div class='listsport'>";
                    echo "<h4>SPORTS</h4>";
                    while ($sport = $reponse->fetch())    //fetch() itérateur
                    {
                            echo "<ul>";
                            echo '<li><i class="fas fa-'.$sport['nom'].'-ball"></i><a class="sport" href="listMatch.php?sport='.$sport['id_sport'].'">'.$sport['nom'].'</a></li>';
                            echo "</ul>";
                    }
                    $reponse->closeCursor();     //fermeture du curseur d'analyse des resultats
                    echo "<h4>LISTE DES MATCHS</h4>";
                    echo "</div>";
                    echo "<div id ='result'></div>";
            ?>
        </div>
        <script src="../Controler/login.js"></script>
        <script src="../Controler/match.js"></script>
    </body>
 
   
  

</html>

