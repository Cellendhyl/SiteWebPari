<?php
        require("../Controler/connexionBDD.php");
        require("../Models/Match.class.php");
        $reponse = $db->query('SELECT * FROM Matchs where id_sport = '.$_GET['sport'].'');
        $reponse->execute(); 
?>


       <form method="post" action="../View/information.php" id="info">
            <select  name="match" id="match">     
                <option value="">--Please choose an option--</option>
            <?php
            while ($match = $reponse->fetch())    //fetch() itérateur
            {
                $m = new Match();
                $m->create($match['id_sport'],$match['equipe1'],$match['equipe2'],$match['date'],$match['cote']);
                echo '<option value="'.$match['id_match'].'">'.$m->__toString().'</option>';
            }
            $reponse->closeCursor();        //fermeture du curseur d'analyse des resultats
            ?>
           </select>
           <button type="submit" name="information" value="information">Information</button>
        </form>
        <br> 
        <script src="../Controler/info.js"></script>';
        
        