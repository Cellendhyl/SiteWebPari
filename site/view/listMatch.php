<?php
        require("../Controler/connexionBDD.php");
        require("../Models/Match.class.php");
        $reponse = $db->query('SELECT * FROM Matchs where id_sport = '.$_GET['sport'].' AND fini=0');
        $reponse->execute(); 
?>
       <form method="post" action="../View/paris.php" id="info">
            <?php
            echo'<div class="listematch">';
            while ($match = $reponse->fetch())    //fetch() itérateur
            {
                echo'<div>';
                echo'<input type="radio" id="match" name="match" value="'.$match['id_match'].'" checked> ';
                echo'<label for="match">'.$match['equipe1']." vs ".$match['equipe2'].'</label>';
                echo'</div>';
            }
            echo'</div>';
            $reponse->closeCursor();        //fermeture du curseur d'analyse des resultats
            ?>
           <?php
            session_start(); 
            if (isset($_SESSION["CONNECT"])) {
               echo '<button type="submit" name="information" value="information">Information</button>';
           }
           ?>
        </form>
        <br> 
       
     
        
        