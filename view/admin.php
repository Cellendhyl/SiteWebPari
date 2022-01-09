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
        require("../Controler/isSetConnectAdmin.php");
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
        echo '<h1>Bonjour '.$_SESSION['LOGIN'].' vous êtes sur un compte administrateur</h1>';
        ?>
    
        
        <form method="post" action="../Controler/admin.php" id="listMatchFini">
            <select  name="matchFini" id="matchFini">     
            <option value="init">--Liste des Matchs finis--</option>
                <?php
                  $reponse = $db->query('SELECT * FROM Matchs WHERE fini=1');
                  $reponse->execute();   
   while ($match = $reponse->fetch())    //fetch() itérateur
   {
        echo $match['id_match']; 
        $reponse2 = $db->query('SELECT * FROM PariUser WHERE id_match ='.$match['id_match']);
        $reponse2->execute();   
        if ($reponse2->rowCount()==0){
            echo '<option value="'.$match['id_match'].'">'.$match['equipe1'].' vs '.$match['equipe2'].'</option>'; 
        }
   }
    ?>
     </select>
     <button type="submit" id="supprimer" name="supprimer" value="supprimer">Supprimer le match</button>
        
        </form>
       
        
  
    <section>
    <form method="post" action="../Controler/admin.php" id="listMatchEnCours">
            <select  name="matchEnCours" id="matchEnCours">     
            <option value="init">--Liste des Matchs en cours--</option>
                <?php
                  $reponse2 = $db->query('SELECT * FROM Matchs WHERE fini=0');
                  $reponse2->execute();   
   while ($match = $reponse2->fetch())    //fetch() itérateur
   {
            echo '<option value="'.$match['id_match'].'">'.$match['equipe1'].' vs '.$match['equipe2'].'</option>'; 
        }
   
    ?>
      </select>
     <button type="submit" id="modifier" name="modifier" value="modifier">modifier le match</button>
     </form>


     <table>
                    <th> Creer un compte admin </th>
                    <form action="../Controler/admin.php" method="POST" id="ajouter">
                    <tr>
                        <td><input type="text" name="identifiant" placeholder="Votre identifiant"  required/></td>
                    </tr>
                    <tr>
                        <td><input type=password name="mdp" placeholder="Votre mot de passe" required/></td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Ajouter un Admin" name="Ajouter" placeholder=""/></td>
                    </tr>
                    </form>
                </table>
                <table>
                    <th> Creer un match </th>
                    <form action="../Controler/admin.php" method="POST" id="ajouterMatch">
                    <tr>
                        <td><select  name="sport" id="sport">     
                            <option value="init">--Liste des Matchs en cours--</option>
                        <?php
                            $reponse2 = $db->query('SELECT * FROM Sport ');
                            $reponse2->execute();   
                            while ($sport = $reponse2->fetch())    //fetch() itérateur
                            {
                                echo '<option value="'.$sport['id_sport'].'">'.$sport['nom'].'</option>'; 
                            }
                        ?>
                        </select></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="equipe1" placeholder="equipe 1"  required/></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="equipe2" placeholder="equipe 2"  required/></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="date" placeholder="date du match"  required/></td>
                    </tr>
                    <tr>
                        <td><input type="number" name="coteEquipe1" placeholder="cote de l'équipe 1"  required/></td>
                    </tr>
                    <tr>
                        <td><input type="number" name="coteEquipe2" placeholder="cote de l'équipe 2"  required/></td>
                    </tr>
                    <tr>
                        <td><input type="number" name="coteNul" placeholder="cote en cas de nul"  required/></td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Ajouter un match" name="AjouterMatch" placeholder=""/></td>
                    </tr>
                    </form>
                </table>
    </section>
    <div id ="result"></div>
    <?php if (isset($_GET['div']))echo $_GET['div'] ?>

</body>
<script src="../js/admin.js"></script>
</html>