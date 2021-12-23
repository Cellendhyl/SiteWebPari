<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta charset="utf-8">
        <title>Ma page</title>
    </head> 
    <body>
        <h1> Les Differents sport : </h1>
        <?php
        require("../Controler/connexionBDD.php");

        $reponse = $db->query('SELECT * FROM Sport');
        $reponse->execute();        
        while ($sport = $reponse->fetch())    //fetch() itérateur
        {
            echo "<ul>";
            echo '<li><a class="sport" href="listMatch.php?sport='.$sport['nom'].'">'.$sport['nom'].'</a></li>';
            echo "</ul>";
        }
        $reponse->closeCursor();        //fermeture du curseur d'analyse des resultats
        echo "<br>"; 
        ?>
        <div id ="result"></div>
    </body>
    <script src="app.js"></script>
</html>

