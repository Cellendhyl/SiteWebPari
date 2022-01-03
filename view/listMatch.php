<?php
        require("../Controler/connexionBDD.php");
        require("../Models/Match.class.php");
        $reponse = $db->query('SELECT * FROM Matchs where id_sport = '.$_GET['sport'].'');
        $reponse->execute(); 
?>


       <form method="post" action="../View/paris.php" id="info">
            <?php
            while ($match = $reponse->fetch())    //fetch() itérateur
            {
                echo'<div>';
                echo'<input type="radio" id="match" name="match" value=""'.$match['id_match'].'"" checked> ';
                echo'<label for="match">'.$match['equipe1']." vs ".$match['equipe2']."  Cote victoire de ".$match['equipe1']." :"." ".$match['cotev1']."   Cote victoire de ".$match['equipe2']." :"." ".$match['cotev2']."   Cote match nul "." :"." ".$match['coteNul'].'</label>';
                echo'</div>';
            }
            $reponse->closeCursor();        //fermeture du curseur d'analyse des resultats
            ?>
           </select>
           <?php
            session_start(); 
            if (isset($_SESSION["CONNECT"])) {
               echo '<button type="submit" name="information" value="information">Information</button>';
           }
           ?>
        </form>
        <br> 
       
     
        
        