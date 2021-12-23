<?php
        require("../Controler/connexionBDD.php");
        require("../Models/Match.class.php");
        $reponse = $db->query('SELECT * FROM Matchs where id_sport = '.$_GET['sport'].'');
        $reponse->execute();        
        while ($match = $reponse->fetch())    //fetch() itérateur
        {
            $m = new Match();
            $m->create($match['id_match'],$match['id_sport'],$match['equipe1'],$match['equipe2'],$match['date'],$match['vainqueur'],$match['score'],$match['cote']);
            echo "<ul>";
            echo '<li><a class="match" href="listMatch.php?sport='.$_GET['sport'].'">'.$m->__toString().'</a></li>';
            echo "</ul>";
        }
        $reponse->closeCursor();        //fermeture du curseur d'analyse des resultats
        echo "<br>"; 
        ?>
        <div id ="result"></div>
    </body>
    <script src="xxx.js"></script>